<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Relationship
use App\Models\User;
use App\Models\Project\ProjectTask;

class ProjectTaskAssignedTo extends Model
{
    use HasFactory;

    protected $table = 'project_task_assigned_tos';

    protected $fillable = [
        'task_id',
        'user_id'
    ];

    public function task () {
        return $this->belongsTo(ProjectTask::class, 'task_id');
    }

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }
}
