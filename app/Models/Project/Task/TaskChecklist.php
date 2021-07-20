<?php

namespace App\Models\Project\Task;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Relationships
use App\Models\Project;
use App\Models\Project\ProjectTask;

class TaskChecklist extends Model
{
    use HasFactory;

    protected $table = 'project_task_checklists';

    protected $fillable = [
        'name',
        'status',
        'unique_id'
    ];

    protected $hidden = [
        'id'
    ];

    public function project () {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function task () {
        return $this->belongsTo(ProjectTask::class, 'task_id');
    }

    public function getRouteKeyName () {
        return 'unique_id';
    }
}
