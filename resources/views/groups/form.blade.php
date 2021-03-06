@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nouveau groupe</div>

                    <div class="panel-body">
                        {!! BootForm::open(['model' => $group ?? new App\Group(), 'url' => route('groups.store'), 'method' => 'POST']) !!}

                        {!! BootForm::text('name', 'Nom', null, ['required' ])!!}
                        {!! BootForm::password('password')!!}
                        {!! BootForm::submit() !!}

                        {!! BootForm::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
