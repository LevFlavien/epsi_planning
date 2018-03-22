@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nouveau devoir</div>

                    <div class="panel-body">
                        {!! BootForm::open(['model' => $homework ?? new App\Homework(), 'url' => route('homework.store', $group->id), 'method' => 'POST']) !!}

                        {!! BootForm::text('name', 'Nom', null, ['required' ])!!}
                        {!! BootForm::text('description', 'Description')!!}
                        {!! BootForm::hidden('group_id', $group->id) !!}
                        {!! BootForm::submit() !!}

                        {!! BootForm::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
