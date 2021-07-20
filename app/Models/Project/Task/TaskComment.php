<?php

namespace App\Models\Project\Task;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Relationships
use App\Models\Project;
use App\Models\Project\ProjectTask;
use App\Models\User;

class TaskComment extends Model
{
    use HasFactory;

    protected $table = 'project_task_comments';

    protected $fillable = [
        'unique_id',
        'project_id',
        'task_id',
        'user_id',
        'text'
    ];

    protected $hidden = [
        'id'
    ];

    public function getRouteKeyName() {
        return 'unique_id';
    }

    public function project () {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function task () {
        return $this->belongsTo(ProjectTask::class, 'task_id');
    }

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }
}
