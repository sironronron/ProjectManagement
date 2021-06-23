<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model Relationship
use App\Models\Client\Client;
use Ap\Models\User;

class ClientNote extends Model
{
    use HasFactory;

    protected $table = 'client_notes';

    protected $fillable = [
        'unique_id',
        'client_id',
        'user_id',
        'title',
        'subtitle',
        'body',
        'visibility'
    ];

    protected $hidden = [
        'id'
    ];

    protected $casts = [
        'created_at' => 'datetime:M d, Y'
    ];

    public function client () {
        return $this->belongsTo(Client::class, 'client_id');
    }
    
    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName () {
        return 'unique_id';
    }
}
