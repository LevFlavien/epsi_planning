<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupsController extends Controller
{
    public function index() {

        $groups = Group::all();

        return view('groups.index', compact('groups'));
    }

    public function show(Group $group) {

        $homeworks = $group->homework;

        return view('groups.show', compact('group', 'homeworks'));
    }


    public function create() {

        return view('groups.form');
    }

    public function form() {

        return view('groups.form');
    }

    public function store() {

        Group::create(request()->all());

        return redirect()->route('groups');
    }
}
