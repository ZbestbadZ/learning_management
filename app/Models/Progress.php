<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Subject;

class Progress extends Model
{
    protected $table = 'progreses';

    protected $fillable = [
        'user_id', 'subject_id', 'score', 'rate',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}