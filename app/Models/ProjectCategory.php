<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;

    protected $table = 'project_categories';

    protected $fillable = [
        'unique_id',
        'user_id',
        'name',
        'description',
        'status'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function projects () {
        return $this->hasMany(Project::class);
    }
}
