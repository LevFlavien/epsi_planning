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
                                <th>id</th>
                                <th>Name</th>
                                <th>Creation date</th>
                                <th>Updated date</th>
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


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
