<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Homework;

class HomeworkController extends Controller
{

    public function show(Group $group, Homework $homework) {

        return view('homework.show', compact('group', 'homework'));
    }

    public function form() {

        return view('homework.form');
    }


}
