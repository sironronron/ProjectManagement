<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Relationships
use App\Models\ProjectCategory;
use App\Models\Project\ProjectTeam;
use App\Models\Project\ProjectTask;
use App\Models\Client\Client;
use App\Models\User;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'projects';

    protected $fillable = [
        'unique_id', 
        'user_id',
        'category_id',
        'client_id',
        'assigned_to',
        'project_manager_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'visibility',
        'budget',
        'remaining_budget',
        'billing',
        'billing_rate',
        'estimated_hours',
        'estimated_costs',
        'tags'
    ];

    protected $casts = [
        'remaining_days' => 'integer',
        'end_date' => 'datetime:M d, Y',
        'start_date' => 'datetime:M d, Y'
    ];

    protected $hidden = [
        'id'
    ];

    public function creator () {
        return $this->belongsTo(User::class);        
    }

    public function getRouteKeyName () {
        return 'unique_id';
    }

    public function category () {
        return $this->belongsTo(ProjectCategory::class);
    }

    public function client () {
        return $this->belongsTo(Client::class);
    }

    public function assigned_to () {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function project_manager () {
        return $this->belongsTo(User::class, 'project_manager_id');
    }

    public function teams () {
        return $this->hasMany(ProjectTeam::class, 'project_id');
    }

    public function tasks() {
        return $this->hasMany(ProjectTask::class, 'project_id');
    }
}
