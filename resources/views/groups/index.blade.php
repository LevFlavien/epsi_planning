@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Groupes</div>

                    <div class="panel-body">

                        <table>
                            <thead></thead>
                            <tbody>
                            <tr>
                                <th>#</th>
                                <th></th>
                            </tr>
                            @foreach ($groups as $group)
                                <tr>
                                    <td></td>
                                    <td></td>
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
