<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groups() {
        return $this->belongsToMany('App\Group', 'groups_roles_users', 'id_user', 'id_group');
            //->withPivot('id_role');
    }

    public function roles() {
        return $this->belongsToMany('App\Role', 'groups_roles_users', 'id_user', 'id_role')
            ->withPivot('id_group');
    }

    public function getGroupRole($id_group) {
        return $this->roles()->wherePivot('id_group', $id_group)->get();
    }

}
