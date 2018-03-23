@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nouveau devoir</div>

                    <div class="panel-body">
                        {!! BootForm::open(['model' => $homework ?? new App\Homework(), 'store' => ['homework.store', $group->id], 'update' => ['homework.update', $group->id]]) !!}

                            {!! BootForm::text('name', 'Nom', null, ['required' ]) !!}
                            {!! BootForm::text('description', 'Description') !!}

                            {!! BootForm::hidden('group_id', $group->id) !!}
                            {!! BootForm::submit('Valider') !!}

                        {!! BootForm::close() !!}

                        @if (!empty($files) && count($files) > 0)
                            <p>Fichiers actuels : </p>
                            @foreach ($files as $file)
                                <p>
                                    <a href="{!! route('files.download', ['group' => $group->id, 'homework' => $homework->id, 'file' => $file->id]) !!}">{!! $file->name !!}</a> (delete)
                                </p>
                            @endforeach
                        @endif
                        @if (!empty($files))
                            <a class="btn btn-primary" href="{!! route('files.form', [$group->id, $homework->id]) !!}">Ajouter fichier</a>
                        @endif
                        <a class="btn btn-primary" href="{!! route('groups.show', $group->id) !!}">Annuler</a>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
