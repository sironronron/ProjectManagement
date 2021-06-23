<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model Relationship
use App\Models\Client\Client;
use App\Models\User;

class ClientRecentActivity extends Model
{
    use HasFactory;

    protected $table = 'client_recent_activities';
    
    protected $fillable = [
        'unique_id',
        'client_id',
        'user_id', 
        'activity',
        'link_title',
        'link'
    ];

    protected $hidden = [
        'id'
    ];

    protected $casts = [
        'created_at' => 'datetime:d M Y H:i:s A'
    ];

    public function getRouteKeyName () {
        return 'unique_id';
    }

    public function client () {
        return $this->belongsTo(Client::class);
    }

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }
}
