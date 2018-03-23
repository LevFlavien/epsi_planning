<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\JoinRequest;

class GroupsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $groups = Group::whereHas('users', function($q) {
            $q->where('user_id', '=', Auth::user()->id);
        })->get();

        return view('groups.index', compact('groups'));
    }

    public function show(Group $group) {

        $ok = Group::whereHas('users', function($q) {
            $q->where('user_id', '=', Auth::user()->id);
        })->get();

        //$user->id;

        if (false) {
            return redirect()->route('groups', $group);
        }

        $homeworks = $group->homework;

        return view('groups.show', compact('group', 'homeworks'));
    }


    public function form() {

        return view('groups.form');
    }

    public function store() {

        $user_id = Auth::user()->id;
        $group = new Group(request()->all());
        $group->user_id = $user_id;
        $group->save();

        $group->users()->attach($user_id); // TODO add role ->attach($user_id, ['role_id' => ID_admin]);

        return redirect()->route('groups');
    }

    public function invitation(Group $group) {

        return view('groups.join', compact('group'));
    }

    public function join(JoinRequest $request, Group $group) {

        if ($request['password'] == $group->password) {
            return redirect()->route('groups.show', $group->id);
            $user_id = Auth::user()->id;
            $group->users()->attach($user_id); // TODO add role ->attach($user_id, ['role_id' => ID_user]);
        }

        return redirect()->route('groups.index', $group->id);
    }
}
