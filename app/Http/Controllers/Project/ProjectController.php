<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;

// Project Models
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Project\ProjectRecentActivity;
use App\Http\Controllers\Project\ProjectRecentActivityController;
use App\Http\Controllers\Client\ClientRecentActivityController;

use App\Models\Team;

use Illuminate\Http\Request;

use Str;
use Auth;
use Carbon\Carbon;

// Jetstream
use Inertia\Inertia;

// Relationship
use App\Models\User;
use App\Models\Client\Client;
use App\Models\Client\ClientUser;
use App\Models\Project\ProjectTeam;
use App\Models\Project\ProjectMilestone;
use App\Models\Project\ProjectTaskStatus;
use App\Models\Project\ProjectTask;
use App\Models\Project\ProjectTaskAssignedTo;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with(['category', 'client'])
        ->latest()
        ->paginate(10);

        $projects->getCollection()->transform(function ($query) {
            if ($query->unscheduled != true) {
                $end = Carbon::parse($query->end_date);

                $current = Carbon::now();
                $length = $end->diffInDays($current);

                $query->remaining_days = $length;

                $query->budget = '₱' . number_format($query->budget, 2);
                $query->remaining_budget = '₱' . number_format($query->remaining_budget, 2);

                $project_teams = ProjectTeam::where('project_id', $query->id)
                    ->distinct()
                    ->get()
                    ->map(function ($query) {
                        $query->members = $query->team->allUsers();
                        return $query;
                    });
                
                $project_teams = $project_teams->pluck('members')->toArray();

                $user_members = [];

                foreach ($project_teams as $team) {
                    foreach ($team as $member) {
                        if (!in_array($member, $user_members)) {
                            $user_members[] = $member;
                        }
                    }
                }

                $query->members = $user_members;

                return $query;
            }
        });

        return Inertia::render('Project/Index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_category_lists = ProjectCategory::where('user_id', Auth::user()->id)
            ->get(['id', 'name', 'status', 'unique_id', 'user_id']);

        $project_categories = ProjectCategory::where('user_id', Auth::user()->id)
            ->get(['name', 'status', 'unique_id', 'user_id']);

        $clients = Client::where('client_status', 'active')
            ->get(['unique_id', 'company_name']);

        $assignee = User::where('current_team_id', '!=', null)->get(['id', 'name']);

        $project_managers = User::where('current_team_id', '!=', null)->get(['id', 'name']);

        return Inertia::render('Project/Create', [
            'project_categories' => $project_categories,
            'project_category_lists' => $project_category_lists,
            'clients' => $clients,
            'assignee' => $assignee,
            'project_managers' => $project_managers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'category_id.required' => 'The category field is required'
        ];

        if ($request->unscheduled != false) {
            $this->validate($request, [
                'name' => 'required|max:255|min:4|string|unique:projects,name',
                'description' => 'required',
                'category_id' => 'required',
                'client_id' => 'required',
                'assigned_to_id' => 'required',
                'project_manager_id' => 'required',
                'budget' => 'nullable|numeric|min:0',
                'billing' => 'nullable|numeric|min:0',
                'estimated_hours' => 'nullable|numeric|min:0',
                'estimated_costs' => 'nullable|numeric|min:0'
            ], $message);
        }
        
        else {
            $this->validate($request, [
                'name' => 'required|max:255|min:4|string|unique:projects,name',
                'description' => 'required',
                'start_date' => 'required|date|max:25',
                'end_date' => 'required|date|max:25',
                'category_id' => 'required',
                'client_id' => 'required',
                'assigned_to_id' => 'required',
                'project_manager_id' => 'required',
                'budget' => 'nullable|numeric|min:0',
                'billing' => 'nullable|numeric|min:0',
                'estimated_hours' => 'nullable|numeric|min:0',
                'estimated_costs' => 'nullable|numeric|min:0'
            ], $message);
        }

        $project = new Project;

        // Get Category
        $project_category = ProjectCategory::where('unique_id', $request->category_id)
            ->first(['id']);

        // Get Client
        $client = Client::where('unique_id', $request->client_id)
            ->first(['id']);

        try {
            $project->unique_id = Str::uuid();
            $project->user_id = Auth::user()->id;
            $project->name = $request->name;
            $project->category_id = $project_category->id;
            $project->client_id = $client->id;
            $project->assigned_to = $request->assigned_to_id;
            $project->project_manager_id = $request->project_manager_id;
            $project->description = $request->description;
            $project->start_date = $request->start_date;
            $project->end_date = $request->end_date;
            $project->visibility = 'everyone';
            $project->unscheduled = $request->unscheduled;
            $project->budget = $request->budget;
            $project->remaining_budget = $request->budget;
            $project->billing = $request->billing;
            $project->billing_rate = $request->billing_rate;
            $project->estimated_hours = $request->estimated_hours;
            $project->estimated_costs = $request->estimated_costs;

            $project->save();

            $data = [];

            $data['project_id'] = $project->id;
            $data['activity'] = 'Created new project!';
            $data['link'] = null;
            $data['link_title'] = null;

            $project_recent_activity = new ProjectRecentActivityController;
            $project_recent_activity->store($data);

            $data_client = [];

            $data_client['client_id'] = $client->id;
            $data_client['activity'] = "Created new project";
            $data_client['link_title'] = $project->name;
            $data_client['link'] = '/projects/show/' . $project->unique_id;

            $client_activity = new ClientRecentActivityController;
            $client_activity->store($data_client);

            return redirect()->route('projects.index')->with('success', 'Successfully created a new project!');
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }
            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($unique_id)
    {
        $project = Project::where('unique_id', $unique_id)
            ->with(['client', 'category', 'assigned_to', 'project_manager'])
            ->first();
        
        $billing = '₱' . number_format($project->billing, 2);
        $billing_rate = ucfirst(str_replace('_', ' ', $project->billing_rate));

        $budget = '₱' . number_format($project->budget, 2);
        $remaining_budget = '₱' . number_format($project->remaining_budget, 2);

        $recent_activities = ProjectRecentActivity::where('project_id', $project->id)
            ->with(['user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $recent_activities->getCollection()->transform(function ($query) {
            $query->actual_time = $query->created_at->diffForHumans();

            return $query;
        });

        $project_teams_count = ProjectTeam::where('project_id', $project->id)
            ->count();

        $project_milestones_count = ProjectMilestone::where('project_id', $project->id)
            ->count();

        $clients = ClientUser::where('client_id', $project->client_id)
            ->with(['user'])
            ->get();
            
        return Inertia::render('Project/Show/Index', [
            'project' => $project,
            'billing' => $billing,
            'billing_rate' => $billing_rate,
            'budget' => $budget,
            'remaining_budget' => $remaining_budget,
            'recent_activities' => $recent_activities,
            'project_teams_count' => $project_teams_count,
            'project_milestones_count' => $project_milestones_count,
            'clients' => $clients
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show_teams($unique_id)
    {
        $project = Project::where('unique_id', $unique_id)
            ->first();

        $project_teams = ProjectTeam::where('project_id', $project->id)
            ->with('team')
            ->paginate(10);

        $project_teams->getCollection()->transform(function ($query) {
            $query->member_count = $query->team->allUsers()->count();
            $query->members = $query->team->allUsers();

            return $query;
        });

        $project_teams_count = ProjectTeam::where('project_id', $project->id)
            ->count();

        $members = [];

        foreach ($project_teams as $team) {
            foreach ($team->members as $member) {
                if (!in_array($member, $members)) {
                    $members[] = $member;
                }
            } 
        }

        $members = collect($members)->map(function ($query) {
            $query->team = $query->currentTeam;

            if (\Cache::has('user-is-online-' . $query['id'])) {
                $query->status = "Active";
            }

            else {
                $query->status = "Offline";
            }

            return $query;
        });

        return Inertia::render('Project/Show/Teams', [
            'project'               => $project,
            'project_teams'         => $project_teams,
            'project_teams_count'   => $project_teams_count,
            'members'               => $members
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show_milestones ($unique_id) {
        $project = Project::where('unique_id', $unique_id)
            ->first();

        $milestones = ProjectMilestone::where('project_id', $project->id)
            ->orderBy('order_by', 'asc')
            ->paginate(10);

        return Inertia::render('Project/Show/Milestones', [
            'project' => $project,
            'milestones' => $milestones
        ]);
    }

    /**
     * Display the specified resource
     * 
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show_tasks ($unique_id) {
        $project = Project::where('unique_id', $unique_id)
            ->first();

        $project_task_statuses = ProjectTaskStatus::where('project_id', $project->id)
            ->get();

        $project_tasks = ProjectTask::where('project_id', $project->id)
            ->with(['created_by', 'milestone', 'status'])
            ->paginate(10);

        $project_tasks->getCollection()->transform(function ($query) {
            $query->priority = ucfirst(str_replace('_', ' ', $query->priority));
            $query->created_on = date('Y-m-d', strtotime($query->created_at));
            $query->assignees = ProjectTaskAssignedTo::where('task_id', $query->id)
                ->with(['user'])
                ->get();

            return $query;
        });

        return Inertia::render('Project/Show/Tasks', [
            'project' => $project,
            'project_task_statuses' => $project_task_statuses,
            'project_tasks' => $project_tasks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
