<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    protected $fillable = [
        'name', 'id_homework'
    ];

    public function homework() {
        return $this->belongsTo('App\Homework');
    }
}
