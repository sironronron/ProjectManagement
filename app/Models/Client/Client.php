<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clients';

    protected $fillable = [
        'unique_id', 'user_id', 'company_name', 'first_name', 'last_name', 'email', 'category_id',
    ];

    protected $hidden = [
        'id'
    ];

    public function created_by () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category () {
        return $this->belongsTo(ClientCategory::class);
    }

    public function owner () {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function getRouteKeyName () {
        return 'unique_id';
    }
}
