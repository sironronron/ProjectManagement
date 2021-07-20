<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Dependencies
use Str;
use Auth;
use Carbon\Carbon;
use Inertia\Inertia;

// Relationships
use App\Models\Project;
use App\Models\Project\ProjectTask;
use App\Models\Project\ProjectTaskStatus;
use App\Models\Project\ProjectMilestone;
use App\Models\Project\ProjectTeam;
use App\Models\Project\ProjectTaskAssignedTo;
use App\Models\Project\Task\TaskChecklist;
use App\Models\Project\Task\TaskAttachment;
use App\Models\Project\Task\TaskComment;

// Controllers
use App\Http\Controllers\Project\ProjectRecentActivityController;

class ProjectTaskController extends Controller
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
            ->first();

        $project_task_statuses = ProjectTaskStatus::where('project_id', $project->id)
            ->orderBy('order_by', 'asc')
            ->get(['name', 'id', 'project_id']);

        $project_milestones = ProjectMilestone::where('project_id', $project->id)
            ->orderBy('order_by', 'asc')
            ->get(['name', 'unique_id']);

        $project_teams = ProjectTeam::where('project_id', $project->id)
            ->with('team')
            ->get()
            ->map(function ($query) {
                $query->member_count = $query->team->allUsers()->count();
                $query->members = $query->team->allUsers();

                return $query;
            });

        $members = [];

        foreach ($project_teams as $team) {
            foreach ($team->members as $member) {
                if (!in_array($member, $members)) {
                    $members[] = ['value' => $member->id, 'label' => $member->name];
                }
            } 
        }

        return Inertia::render('Project/Create/Task/Create', [
            'project' => $project,
            'project_task_statuses' => $project_task_statuses,
            'project_milestones' => $project_milestones,
            'members' => $members
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
            'title' => 'required|max:50',
            'milestone_id' => 'required',
            'assigned_to' => 'required',
            'due_date' => 'required|date',
            'status_id' => 'required',
            'priority' => 'required|in:normal,high,urgent,low'
        ]);

        try {
            $project = Project::where('unique_id', $request->project_id)
                ->first();

            $milestone = ProjectMilestone::where('unique_id', $request->milestone_id)
                ->first();

            // Create Task
            $project_task = new ProjectTask;

            $project_task->unique_id = Str::uuid();
            $project_task->project_id = $project->id;
            $project_task->created_by = Auth::user()->id;
            $project_task->milestone_id = $milestone->id;
            $project_task->status_id = $request->status_id;
            $project_task->title = $request->title;
            $project_task->description = $request->description;
            $project_task->priority = $request->priority;
            $project_task->visible_to_client = $request->visible_to_client;
            $project_task->billable = $request->billable;
            $project_task->due_date = $request->due_date;

            $project_task->save();

            // Assign Task
            foreach ($request->assigned_to as $assignees) {
                $project_assigned_to = new ProjectTaskAssignedTo;

                $project_assigned_to->task_id = $project_task->id;
                $project_assigned_to->user_id = $assignees;

                $project_assigned_to->save();
            }
            
            $data = [];

            $data['project_id'] = $project->id;
            $data['activity'] = 'Added new task!';
            $data['link'] = null;
            $data['link_title'] = $project_task->title;

            $project_recent_activity = new ProjectRecentActivityController;
            $project_recent_activity->store($data);

            return redirect()->route('projects.show.tasks', $project->unique_id)->with('success', 'Added new task!');
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
    public function show($project_id, $task_id)
    {
        $project = Project::where('unique_id', $project_id)
            ->first();

        $task = ProjectTask::where('unique_id', $task_id)
            ->with(['milestone'])
            ->first();

        $checklist_items = TaskChecklist::where('task_id', $task->id)
            ->where('project_id', $project->id)
            ->get();

        $finished_items = $checklist_items->where('status', 1)->count();

        if ($checklist_items->count() != 0) {
            $checklist_percentage = ($finished_items / $checklist_items->count()) * 100; 
        }

        else {
            $checklist_percentage = 0;
        }

        $attachments = TaskAttachment::where('project_id', $project->id)
            ->latest()
            ->where('task_id', $task->id)
            ->with('user')
            ->get();

        $comments = TaskComment::where('project_id', $project->id)
            ->where('task_id', $task->id)
            ->with('user')
            ->latest()
            ->get()
            ->map(function ($query) {
                $query->time_diff = $query->created_at->diffForHumans();
                return $query;
            });

        return Inertia::render('Project/Show/Tasks/Show', [
            'project' => $project,
            'task' => $task,
            'check_lists' => $checklist_items,
            'finished_items' => $finished_items,
            'checklist_percentage' => $checklist_percentage,
            'attachments' => $attachments,
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id, $task_id)
    {
        $task = ProjectTask::where('unique_id', $task_id)
            ->first();
        $project = Project::where('unique_id', $project_id)
            ->first();

        $project_task_statuses = ProjectTaskStatus::where('project_id', $project->id)
            ->orderBy('order_by', 'asc')
            ->get(['name', 'id', 'project_id']);

        $project_milestones = ProjectMilestone::where('project_id', $project->id)
            ->orderBy('order_by', 'asc')
            ->get(['name', 'unique_id']);

        $project_teams = ProjectTeam::where('project_id', $project->id)
            ->with('team')
            ->get()
            ->map(function ($query) {
                $query->member_count = $query->team->allUsers()->count();
                $query->members = $query->team->allUsers();

                return $query;
            });

        $members = [];
    
        foreach ($project_teams as $team) {
            foreach ($team->members as $member) {
                if (!in_array($member, $members)) {
                    $members[] = ['value' => $member->id, 'label' => $member->name];
                }
            }
        }

        return Inertia::render('Project/Edit/Task/EditTaskForm', [
            'project' => $project,
            'task' => $task,
            'project_task_statuses' => $project_task_statuses,
            'project_milestones' => $project_milestones,
            'members' => $members,
        ]);
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
        
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update_description (Request $request, $project_task_id)
    {
        try {
            $task = ProjectTask::where('unique_id', $project_task_id)
                ->first();

            $project = Project::where('id', $task->project_id)
                ->first();

            $task->description = $request->input('description');
            $task->update();

            $data = [];

            $data['project_id'] = $project->id;
            $data['activity'] = 'Updated task!';
            $data['link'] = 'projects/tasks/' . $project->unique_id . '/show/' . $task->unique_id . '/view';
            $data['link_title'] = $task->title;

            $project_recent_activity = new ProjectRecentActivityController;
            $project_recent_activity->store($data);

            return redirect()->back()->with('success', 'Updated task description!');
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
