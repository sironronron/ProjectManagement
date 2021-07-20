<?php

namespace App\Models\Project\Task;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Relationships
use App\Models\Project;
use App\Models\User;
use App\Models\Project\ProjectTask;

class TaskAttachment extends Model
{
    use HasFactory;

    protected $table = 'project_task_attachments';

    protected $fillable = [
        'unique_id',
        'user_id',
        'project_id',
        'task_id',
        'file_name',
        'file_location'
    ];

    protected $hidden = [
        'id'
    ];

    public function getRouteKeyName () {
        return 'unique_id';
    }

    public function project () {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function task () {
        return $this->belongsTo(ProjectTask::class, 'task_id');
    }
}
