@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Groupes</div>

                    <div class="panel-body">

                        {!! BootForm::open(['model' => $file ?? new App\File(), 'store' => 'files.store', 'update' => 'files.update']) !!}

                        {!! BootForm::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
