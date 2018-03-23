<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    protected $fillable = [
        'name', 'homework_id'
    ];

    public function homework() {
        return $this->belongsTo('App\Homework');
    }
}
