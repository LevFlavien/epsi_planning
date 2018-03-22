@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Devoir</div>



                    <div class="panel-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mati&egrave;re</th>
                                    <th>Description</th>
                                    <th>Date de cr&eacute;ation</th>
                                    <th>Date de modification</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($homeworks as $homework)
                                    <tr>
                                        <td>{!! $homework->id !!}</td>
                                        <td><a href="{!! route('homework.show', [$group->id, $homework->id]) !!}">{!! $homework->name !!}</a></td>
                                        <td>{!! $homework->description !!}</td>
                                        <td>{!! $homework->created_at !!}</td>
                                        <td>{!! $homework->updated_at !!}</td>
                                        <td><button class="btn btn-default"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <a href="{!! route('homework.form', $group->id)!!}"><button class="btn btn-primary"> Ajouter devoir</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
