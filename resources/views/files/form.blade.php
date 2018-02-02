@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ajout fichier</div>

                    <div class="panel-body">

                        {!! BootForm::open(['model' => $file ?? new App\File(), 'url' => route('files.upload', ['group' => $group->id]), 'method' => 'POST']) !!}

                            {!! BootForm::file('name') !!}

                            {!! BootForm::submit() !!}

                        {!! BootForm::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection