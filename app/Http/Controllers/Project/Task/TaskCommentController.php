<?php

namespace App\Http\Controllers\Project\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Relationships
use App\Models\Project;
use App\Models\User;
use App\Models\Project\ProjectTask;
use App\Models\Project\Task\TaskComment;

// Dependencies
use Str;
use Auth;
use Carbon\Carbon;

class TaskCommentController extends Controller
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
            'text' => 'required'
        ]);

        try {
            $comment = new TaskComment;

            $comment->unique_id = Str::uuid();
            
            // Get Project
            $project = Project::where('unique_id', $request->project_id)
                ->first();

            $comment->project_id = $project->id;

            // Get Task
            $task = ProjectTask::where('unique_id', $request->task_id)
                ->first();
            
            $comment->task_id = $task->id;
            // End
            
            $comment->user_id = Auth::user()->id;
            $comment->text = $request->text;
            $comment->save();

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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskComment $comment)
    {
        $this->validate($request, [
            'text' => 'required'
        ]);

        try {
            $comment->text = $request->text;
            $comment->update();
            
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskComment $comment)
    {
        try {
            TaskComment::destroy($comment->id);
            return redirect()->back();
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }
}
