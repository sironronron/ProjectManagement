<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Jetstream
use Inertia\Inertia;

// Dependencies
use Str;
use Carbon\Carbon;
use Auth;

// Relationships
use App\Models\Project;
use App\Models\Project\ProjectMilestone;

// Controllers
use App\Http\Controllers\Project\ProjectRecentActivityController;
use App\Http\Controllers\Client\ClientRecentActivityController;

class ProjectMilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        return Inertia::render('Project/Create/Milestone/CreateMilestoneForm', [
            'project' => $project
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
        $this->validate($request, [
            'name' => 'required|max:50'
        ]);

        try {
            $project = Project::where('unique_id', $request->project_id)
                ->first();

            $milestone = new ProjectMilestone;

            $milestone->unique_id = Str::uuid();
            $milestone->project_id = $project->id;
            $milestone->user_id = Auth::user()->id;
            $milestone->name = $request->name;

            $milestone->save();

            $data = [];

            $data['project_id'] = $project->id;
            $data['user_id'] = Auth::user()->id;
            $data['activity'] = 'Created new milestone!';
            $data['link_title'] = $milestone->name;
            $data['link'] = null;

            $project_recent_activity = new ProjectRecentActivityController;
            $project_recent_activity->store($data);

            $data_client = [];

            $data_client['client_id'] = $project->client_id;
            $data_client['user_id'] = Auth::user()->id;
            $data_client['activity'] = 'Created new milestone';
            $data_client['link_title'] = $milestone->name;
            $data_client['link'] = null;

            $client_recent_activity = new ClientRecentActivityController;
            $client_recent_activity->store($data_client);

            return redirect()->route('projects.show.milestones', $project->unique_id)->with('success', 'Created new milestone! ' . $milestone->name);
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($project, $project_milestone)
    {
        $project = Project::where('unique_id', $project)
            ->first();

        $milestone = ProjectMilestone::where('unique_id', $project_milestone)
            ->first();

        return Inertia::render('Project/Edit/Milestone/EditMilestoneForm', [
            'project' => $project,
            'milestone' => $milestone
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $project, $project_milestone)
    {
        $milestone = ProjectMilestone::where('unique_id', $project_milestone)
            ->first();

        $this->validate($request, [
            'name' => 'required|max:50'
        ]);

        try {
            $project = Project::where('unique_id', $project)
                ->first();

            $milestone->unique_id = Str::uuid();
            $milestone->project_id = $project->id;
            $milestone->user_id = Auth::user()->id;
            $milestone->name = $request->name;

            $milestone->update();

            $data = [];

            $data['project_id'] = $project->id;
            $data['user_id'] = Auth::user()->id;
            $data['activity'] = 'Updated milestone!';
            $data['link_title'] = $milestone->name;
            $data['link'] = null;

            $project_recent_activity = new ProjectRecentActivityController;
            $project_recent_activity->store($data);

            $data_client = [];

            $data_client['client_id'] = $project->client_id;
            $data_client['user_id'] = Auth::user()->id;
            $data_client['activity'] = 'Updated milestone';
            $data_client['link_title'] = $milestone->name;
            $data_client['link'] = null;

            $client_recent_activity = new ClientRecentActivityController;
            $client_recent_activity->store($data_client);

            return redirect()->route('projects.show.milestones', $project->unique_id)->with('success', 'Updated milestone! ' . $milestone->name);
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($project_milestone)
    {
        $project_milestone = ProjectMilestone::where('unique_id', $project_milestone)
            ->first();

        $project = Project::where('id', $project_milestone->project_id)
            ->first();

        try {
            $data = [];

            $data['project_id'] = $project->id;
            $data['user_id'] = Auth::user()->id;
            $data['activity'] = 'Deleted milestone!';
            $data['link_title'] = $project_milestone->name;
            $data['link'] = null;

            $project_recent_activity = new ProjectRecentActivityController;
            $project_recent_activity->store($data);

            $data_client = [];

            $data_client['client_id'] = $project->client_id;
            $data_client['user_id'] = Auth::user()->id;
            $data_client['activity'] = 'Deleted milestone';
            $data_client['link_title'] = $project_milestone->name;
            $data_client['link'] = null;

            $client_recent_activity = new ClientRecentActivityController;
            $client_recent_activity->store($data_client);

            ProjectMilestone::destroy($project_milestone->id);

            return redirect()->back()->with('success', 'Project Milestone successfully deleted!');
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }
}
