@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
                            </tr>

                            </thead>
                            <tbody>
                            @foreach ($homeworks as $homework)
                                <tr>
                                    <td>{!! $homework->id !!}</td>
                                    <td>{!! $homework->name !!}</td>
                                    <td>{!! $homework->description !!}</td>
                                    <td>{!! $homework->created_at !!}</td>
                                    <td>{!! $homework->updated_at !!}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
