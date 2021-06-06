<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $table = 'projects';

    protected $fillable = [
        'unique_id', 
        'user_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'visibility',
        'team_id'
    ];

    protected $casts = [
        'remaining_days' => 'integer'
    ];

    protected $appends = [
        
    ];

    public function creator () {
        return $this->belongsTo(User::class);        
    }
}
