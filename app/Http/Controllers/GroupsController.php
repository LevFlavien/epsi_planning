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


        return view('groups.form', compact('group'));
    }

    public function create() {

        return view('groups.form');
    }

    public function store(Group $group) {

        $group::create();

        return redirect('groups.index');
    }
}
