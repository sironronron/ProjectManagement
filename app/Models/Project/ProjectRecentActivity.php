<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Relationships
use App\Models\Project;
use App\Models\User;

class ProjectRecentActivity extends Model
{
    use HasFactory;

    protected $table = 'project_recent_activities';

    protected $fillable = [
        'unique_id',
        'project_id',
        'user_id',
        'activity',
        'link',
        'link_title'
    ];

    protected $hidden = [
        'id'
    ];

    protected $casts = [
        'created_at' => 'datetime:d M Y H:i:s A'
    ];

    public function getRouteKeyName() {
        return 'unique_id';
    }

    public function project () {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }
}
