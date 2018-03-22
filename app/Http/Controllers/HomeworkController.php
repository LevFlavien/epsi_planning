<?php

namespace App\Http\Controllers;

use App\Group;
use App\Homework;

class HomeworkController extends Controller
{

    public function show(Group $group, Homework $homework) {

        return view('homework.show', compact('group', 'homework'));
    }

    public function form(Group $group) {

        return view('homework.form', compact('group'));
    }

    public function store(Group $group) {

        Homework::create(request()->all());

        return redirect()->route('groups.show', compact('group'));
    }

}
