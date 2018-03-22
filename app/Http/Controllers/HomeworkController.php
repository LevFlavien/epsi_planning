<?php

namespace App\Http\Controllers;

use App\Group;
use App\Homework;
use App\File;

class HomeworkController extends Controller
{

    public function show(Group $group, Homework $homework) {

        $files = $homework->files;

        return view('homework.form', compact('group', 'homework', 'files'));
    }

    public function form(Group $group) {

        return view('homework.form', compact('group'));
    }

    public function store(Group $group) {

        Homework::create(request()->all());

        return redirect()->route('groups.show', compact('group'));
    }

    public function update(Group $group, $id) {

        $homework = Homework::firstOrNew(['id' => $id]);
        $homework->fill(request()->all());
        $homework->save();

        return redirect()->route('groups.show', compact('group'));
    }

}
