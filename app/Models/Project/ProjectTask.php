<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Relationships
use App\Models\Project;
use App\Models\User;
use App\Models\Project\ProjectMilestone;
use App\Models\Project\ProjectTaskStatus;

class ProjectTask extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'project_tasks';

    protected $fillable = [
        'unique_id',
        'project_id',
        'created_by',
        'milestone_id',
        'status_id',
        'title',
        'description',
        'priority',
        'visible_to_client',
        'billable',
        'start_date',
        'due_date',
        'tags'
    ];

    public function getRouteKeyName () {
        return 'unique_id';
    }

    public function project () {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function created_by () {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function milestone () {
        return $this->belongsTo(ProjectMilestone::class, 'milestone_id');
    }

    public function status () {
        return $this->belongsTo(ProjectTaskStatus::class, 'status_id');
    }
}
