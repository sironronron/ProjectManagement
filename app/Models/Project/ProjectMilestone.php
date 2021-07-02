<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\User;

class ProjectMilestone extends Model
{
    use HasFactory;

    protected $table = 'project_milestones';

    protected $fillable = [
        'unique_id',
        'project_id',
        'user_id',
        'name'
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
}
