<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Progress;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $fillable = [
        'name', 'ma_mh', 'description', 'giang_vien', 'email_gv', 'ki_hoc'
    ];

    public function progress() {
        return $this->hasMany(Progress::class, 'subject_id', 'id');
    }

}