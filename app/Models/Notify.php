<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Notify extends Model
{
    protected $table = 'notifies';

    protected $fillable = [
        'user_id', 'name', 'notify'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}