@extends('layout.layout')

@section('title')
    Stations: Browse
@endsection

@section('content')
    <div class="large-12 medium-12 small-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">

                </h3>
            </div>
            <div class="box-body">
                <a href="{{$name}}/create" class="button">New Entry</a>
                <table>
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>River</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($station As $stations)
                        <tr>
                            <td>{{$stations->date_taken}}</td>
                            <td>{{$stations->river_focus}}</td>
                            <td><a href="/station/{{$stations->id}}/image">Link</a></td>
                            <td><a href='{{url("/station/{$stations->id}/edit")}}'>Edit</a></td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
