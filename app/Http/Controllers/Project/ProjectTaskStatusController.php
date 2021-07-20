<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Project\ProjectTaskStatus;

// Controllers
use App\Http\Controllers\Project\ProjectRecentActivityController;

// Inertia
use Inertia\Inertia;

class ProjectTaskStatusController extends Controller
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
    public function create()
    {
        //
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
            'name' => 'required|max:50|unique:project_task_statuses,name',
            'order_by' => 'required|unique:project_task_statuses,order_by'
        ]);

        try {
            $project = Project::where('unique_id', $request->project_id)
                ->first();

            $project_task_status = new ProjectTaskStatus;

            $project_task_status->project_id = $project->id;
            $project_task_status->name = $request->name;
            $project_task_status->order_by = $request->order_by;

            $project_task_status->save();

            $data = [];

            $data['project_id'] = $project->id;
            $data['activity'] = 'Created new task status!';
            $data['link'] = null;
            $data['link_title'] = $project_task_status->name;

            $project_recent_activity = new ProjectRecentActivityController;
            $project_recent_activity->store($data);

            return redirect()->back()->with('success', 'Added new task status!');
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
    public function edit($project_id, $project_task_status)
    {
        $project = Project::where('id', $project_id)
            ->first();

        $project_task_status = ProjectTaskStatus::where('id', $project_task_status)
            ->first();

        return Inertia::render('Project/Edit/TaskStatus/EditTaskStatusForm', [
            'project' => $project,
            'project_task_status' => $project_task_status
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $project, $project_task_status)
    {
        $project = Project::where('unique_id', $project)
            ->first();

        $project_task_status = ProjectTaskStatus::where('id', $project_task_status)
            ->first();

        $this->validate($request, [
            'name' => 'required|max:50|unique:project_task_statuses,name,' . $project_task_status->id,
            'order_by' => 'required|unique:project_task_statuses,order_by,' . $project_task_status->order_by
        ]);

        try {
            $project_task_status->name = $request->name;
            $project_task_status->order_by = $request->order_by;

            $project_task_status->update();

            $data = [];

            $data['project_id'] = $project->id;
            $data['activity'] = 'Updated task status!';
            $data['link'] = null;
            $data['link_title'] = $project_task_status->name;

            $project_recent_activity = new ProjectRecentActivityController;
            $project_recent_activity->store($data);

            return redirect()->back()->with('success', "Updated task status $project_task_status->name");
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
    public function destroy($project_task_status)
    {
        try {
            $project_task_status_id = ProjectTaskStatus::where('id', $project_task_status)
                ->first();

            $data = [];

            $data['project_id'] = $project_task_status_id->project_id;
            $data['activity'] = 'Deleted task status!';
            $data['link'] = null;
            $data['link_title'] = $project_task_status_id->name;

            $project_recent_activity = new ProjectRecentActivityController;
            $project_recent_activity->store($data);

            ProjectTaskStatus::destroy($project_task_status_id);

            return redirect()->back()->with('success', 'Project task status successfully deleted!');
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }
}
