<?php

namespace App\Http\Controllers\Project\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Relationships
use App\Models\Project;
use App\Models\Project\ProjectTask;
use App\Models\Project\Task\TaskAttachment;

// Dependencies
use Str;
use Auth;
use Carbon\Carbon;
use File;

class TaskAttachmentController extends Controller
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
        try {
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $file_attachment = new TaskAttachment;

                    $file_attachment->unique_id     = Str::uuid();
                    $file_attachment->user_id       = Auth::user()->id;

                    // Get Project
                    $project = Project::where('unique_id', $request->project_id)
                        ->select('id')
                        ->first();

                    $file_attachment->project_id = $project->id;
                        
                    // Get Task
                    $project_task = ProjectTask::where('unique_id', $request->task_id)
                        ->select('id')
                        ->first();

                    $file_attachment->task_id = $project_task->id;

                    // End
                    $file_name = $file->getClientOriginalName();
                    $file_system_name = time() . '-' . Str::random(9) . '.' . $file->getClientOriginalExtension();

                    $file_attachment->file_name = $file_name;
                    $file_attachment->file_system_name = $file_system_name;
                    $file_attachment->file_type = $file->getClientOriginalExtension();
                    $file_attachment->file_location = env('APP_URL') . '/storage/projects/tasks/attachments/' . $file_system_name;
                
                    // Upload File
                    $file->storeAs('public/projects/tasks/attachments', $file_system_name);
                
                    $file_attachment->save();
                }

                return redirect()->back();
            }
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }

    public function download (TaskAttachment $file)
    {
        try {
            $file_path = public_path('storage/projects/tasks/attachments/'. $file->file_system_name);
            return response()->download($file_path);
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
    public function destroy(TaskAttachment $file)
    {
        try {
            if (File::exists(public_path('storage/projects/tasks/attachments/' . $file->file_system_name))) {
                File::delete(public_path('storage/projects/tasks/attachments/' . $file->file_system_name));
            }
            $file->delete();
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
