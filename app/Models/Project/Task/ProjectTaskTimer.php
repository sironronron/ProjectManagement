<?php

namespace App\Models\Project\Task;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Relationships
use App\Models\User;
use App\Models\Project;
use App\Models\Project\ProjectTask;

class ProjectTaskTimer extends Model
{
    use HasFactory;

    protected $table = 'project_task_timers';

    protected $fillable = [
        'unique_id',
        'project_id',
        'task_id',
        'user_id',
        'started_at',
        'stopped_at'
    ];

    protected $dates = [
        'started_at',
        'stopped_at'
    ];

    protected $with = ['user'];

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project () {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function task () {
        return $this->belongsTo(ProjectTask::class, 'task_id');
    }

    public function scopeMine ($query) {
        return $query->whereUserId(auth()->user()->id);
    }

    public function scopeRunning ($query) {
        return $query->whereNull('stopped_at');
    }
}
