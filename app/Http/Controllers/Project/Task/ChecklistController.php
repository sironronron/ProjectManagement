<?php

namespace App\Http\Controllers\Project\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project\Task\TaskChecklist;

// Relationships
use App\Models\Project;
use App\Models\Project\ProjectTask;

// Dependencies
use Str;
use Auth;
use Carbon\Carbon;

class ChecklistController extends Controller
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
            'name' => 'required|max:50',
        ]);

        try {
            $checklist = new TaskChecklist;

            $checklist->unique_id = Str::uuid();
            $checklist->name = $request->name;
            
            // Project
            $project = Project::where('unique_id', $request->project_id)
                ->select('id', 'unique_id')
                ->first();

            $checklist->project_id = $project->id;
        
            // Task
            $task = ProjectTask::where('unique_id', $request->task_id)
                ->select('id', 'unique_id')
                ->first();

            $checklist->task_id = $task->id;

            $checklist->save();

            return redirect()->back();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, TaskChecklist $item)
    {
        try {
            $item->name = $request->name;
            $item->update();

            return redirect()->back();
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status(Request $request, TaskChecklist $item)
    {
        try {
            $item->status = !$item->status;
            $item->update();

            return redirect()->back();
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskChecklist $item)
    {
        try {
            TaskChecklist::destroy($item->id);
            return redirect()->back();
        } catch (\Exception $e) {
            if (env('APP_DEBUG')) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }
}
