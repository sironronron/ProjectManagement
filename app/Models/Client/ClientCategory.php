<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCategory extends Model
{
    use HasFactory;

    protected $table = 'client_categories';

    protected $fillable = [
        'unique_id', 'user_id', 'name', 'description', 'status'
    ];
    
    protected $hidden = [
        'id'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName () {
        return 'unique_id';
    }
}
