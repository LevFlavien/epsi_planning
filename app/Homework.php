<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{

    protected $fillable = [
        'name', 'description', 'group_id'
    ];

    public function group() {
        return $this->belongsTo('App\Group');
    }
}
