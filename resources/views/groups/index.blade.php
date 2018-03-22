@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Groupes</div>

                    <div class="panel-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Date de création</th>
                                    <th>Date de mise à jour</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($groups as $group)
                                    <tr>
                                        <td>{!! $group->id !!}</td>
                                        <td><a href="{!! route('groups.show', $group->id)!!}">{!! $group->name !!}</a></td>
                                        <td>{!! $group->created_at !!}</td>
                                        <td>{!! $group->updated_at !!}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <a href="{!! route('groups.form')!!}">{!! BootForm::submit('Ajouter un groupe') !!}</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
