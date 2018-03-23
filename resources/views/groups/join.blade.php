@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nouveau groupe</div>

                    <div class="panel-body">
                        {!! BootForm::open(['url' => route('groups.join', $group->id), 'method' => 'POST']) !!}

                        {!! BootForm::password('password')!!}
                        {!! BootForm::submit('Rejoindre') !!}

                        {!! BootForm::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
