<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $fillable = [
        'name', 'password',
    ];

    public function users() {
        return $this->belongsToMany('App\User', 'groups_roles_users', 'group_id', 'user_id');
    }

    public function admin() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function homework() {
        return $this->hasMany('App\Homework');
    }
}
