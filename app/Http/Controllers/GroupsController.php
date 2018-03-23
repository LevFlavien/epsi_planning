<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $groups = Group::all();

        return view('groups.index', compact('groups'));
    }

    public function show(Group $group) {

        //dd($group->users);

        $user_id = Auth::user()->id;
        $ok = Group::whereHas('users', function($q) use ($user_id) {
            $q->where('user_id', '=', $user_id);
        })->get();
        //dd($ok);

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

        return route('groups.join', compact('group'));
    }

    public function join(Group $group) {

        $user_id = Auth::user()->id;
        $group->users()->attach($user_id); // TODO add role ->attach($user_id, ['role_id' => ID_user]);

        return redirect()->route('groups.show', $group->id);
    }
}
