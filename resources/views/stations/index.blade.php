@extends('layout.layout')

@section('title')
    Stations: Browse
@endsection

@section('content')
    <div class="large-12 medium-12 small-12">
        <div class="box">
            <div class="box-header">
                <h3>{{ucwords(str_replace('_',' ',$name))}}</h3>
            </div>
            <div class="box-body">
                <a href="{{$name}}/create" class="button">New Entry</a>
                <table>
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>River</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($station As $stations)
                        <tr>
                            <td>{{$stations->date_taken}}</td>
                            <td>{{ucwords($stations->river_focus)}}</td>
                            <td><a href="/station/{{$stations->id}}/image">Link</a></td>
                            <td>
                                <form action="/station/{{$stations->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href='{{URL::to("/station/{$stations->id}/view")}}' class="button">View</a>
                                    <a href='{{url("/station/{$stations->id}/edit")}}' class="button success">Edit</a>
                                    <button type="submit" class="button alert">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
