<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Relationship
use App\Models\Project;

class ProjectTaskStatus extends Model
{
    use HasFactory;

    protected $table = 'project_task_statuses';

    protected $fillable = [
        'project_id',
        'name',
        'order_by'
    ];

    public function project () {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
