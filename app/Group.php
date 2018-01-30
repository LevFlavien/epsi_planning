<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $fillable = [
        'name', 'password',
    ];

    public function users() {
        return $this->belongsToMany('App\User', 'groups_roles_users', 'id_group', 'id_user');
    }
}
