<?php

namespace App\Http\Controllers\Project\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Dependencies;
use Str;
use Carbon\Carbon;
use Auth;

// Relationships
use App\Models\Project;
use App\Models\Project\ProjectTask;
use App\Models\Project\Task\ProjectTaskTimer;

class ProjectTaskTimerController extends Controller
{
    public function store (Request $request, ProjectTask $project_task)
    {
        try {
            // Check if there's an existing timer
            $project_task_timer_exists = ProjectTaskTimer::where('task_id', $project_task->id)
                ->where('project_id', $project_task->project_id)
                ->where('user_id', Auth::user()->id)
                ->exists();

            if ($project_task_timer_exists) {
                $project_task_timer = ProjectTaskTimer::where('task_id', $project_task->id)
                    ->where('project_id', $project_task->project_id)
                    ->where('user_id', Auth::user()->id)
                    ->first();

                $project_task_timer->stopped_at = null;
                $project_task_timer->update();
            }

            else {
                $project_task_timer = new ProjectTaskTimer;

                $project_task_timer->unique_id = Str::uuid();
                $project_task_timer->user_id = Auth::user()->id;
                $project_task_timer->project_id = $project_task->project_id;
                $project_task_timer->task_id = $project_task->id;
                $project_task_timer->started_at = new Carbon;
    
                $project_task_timer->save();
            }

            return redirect()->back();
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }

    public function stop (Request $request, ProjectTask $project_task)
    {
        try {
            $project_task_timer = ProjectTaskTimer::where('user_id', Auth::user()->id)
                ->where('project_id', $project_task->project_id)
                ->where('task_id', $project_task->id)
                ->first();

            $project_task_timer->stopped_at = new Carbon;
            $project_task_timer->update();

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
