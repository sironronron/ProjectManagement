<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Client;
use App\Models\User;

class ClientUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'client_users';

    protected $fillable = [
        'client_id', 'user_id'
    ];

    public function client () {
        return $this->belongsTo(Client::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}
