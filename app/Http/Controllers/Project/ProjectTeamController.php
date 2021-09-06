<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Project\ProjectRecentActivityController;

use App\Models\Project\ProjectTeam;

// Dependencies
use Auth;
use Str;
use Inertia\Inertia;

// Relationships
use App\Models\Project;
use App\Models\Team;

class ProjectTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($unique_id)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($unique_id)
    {
        $project = Project::where('unique_id', $unique_id)
            ->with(['client', 'category', 'assigned_to', 'project_manager'])
            ->first();

        $billing = '₱' . number_format($project->billing, 2);
        $billing_rate = ucfirst(str_replace('_', ' ', $project->billing_rate));
    
        $budget = '₱' . number_format($project->budget, 2);
        $remaining_budget = '₱' . number_format($project->remaining_budget, 2);

        $project_teams = ProjectTeam::where('project_id', $project->id)
            ->pluck('team_id');

        $teams = Team::where('personal_team', 0)
            ->whereNotIn('id', $project_teams)
            ->get();

        $project_teams_count = ProjectTeam::where('project_id', $project->id)
            ->count();

        return Inertia::render('Project/Create/Team/CreateTeamForm', [
            'project' => $project,
            'billing' => $billing,
            'billing_rate' => $billing_rate,
            'budget' => $budget,
            'remaining_budget' => $remaining_budget,
            'teams' => $teams,
            'project_teams_count' => $project_teams_count
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
            'team_id.required' => 'The team field is required'
        ];

        $this->validate($request, [
            'team_id' => 'required'
        ], $message);

        try {
            $project = Project::where('unique_id', $request->project_id)
                ->first();

            $project_team = new ProjectTeam;

            $project_team->project_id = $project->id;
            $project_team->team_id = $request->team_id;

            $project_team->save();

            $team = Team::where('id', $request->team_id)
                ->first();

            $data = [];

            $data['project_id'] = $project->id;
            $data['user_id'] = Auth::user()->id;
            $data['activity'] = "Invited a new team!";
            $data['link'] = null;
            $data['link_title'] = $team->name;

            $project_recent_activity = new ProjectRecentActivityController;
            $project_recent_activity->store($data);

            return redirect()->route('projects.show.teams', [$project->unique_id])->with('success', 'Invited new team! ' . $team->name);
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, $project_team_id)
    {
        $project_teams = ProjectTeam::where('project_id', $project->id)
            ->with('team')
            ->paginate(10);

        $project_teams->getCollection()->transform(function ($query) {
            $query->member_count = $query->team->allUsers()->count();
            $query->members = $query->team->allUsers();
    
            return $query;
        });

        $project_team = ProjectTeam::where('id', $project_team_id)
            ->with('team')
            ->first();


        $members = $project_team->team->allUsers();

        $members->collect($members)->map(function ($query) {
            $query->team = $query->currentTeam;

            if (\Cache::has('user-is-online-' . $query->id)) {
                $query->status = "Active";
            } else {
                $query->status = 'Offline';
            }
        });

        return Inertia::render('Project/Show/Teams/Show', [
            'project' => $project,
            'project_team' => $project_team,
            'project_teams' => $project_teams,
            'members' => $members
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectTeam $project_team)
    {
        try {
            $project = Project::where('id', $project_team->project_id)
                ->select('id', 'unique_id')
                ->first();

            $project_team->delete();
            return redirect()->route('projects.show.teams', $project->unique_id)->with('success', 'Team removed!');
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }
}
