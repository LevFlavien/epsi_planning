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


        return view('groups.show', compact('group'));
    }


    public function create() {

        return view('groups.form');
    }

    public function form() {

//        $test = ['a'=>7,'t'=>8,'z'=>9];
//
//        dump($test);die;
        return view('groups.form');
    }

    public function store(Group $group) {

        $group::create();

        return redirect('groups.index');
    }
}
