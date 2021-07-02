<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Relationships
use App\Models\Team;
use App\Models\Project;

class ProjectTeam extends Model
{
    use HasFactory;

    protected $table = 'project_teams';

    protected $fillable = [
        'team_id',
        'project_id'  
    ];

    public function team () {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function project () {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
