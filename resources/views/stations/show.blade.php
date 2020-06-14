@extends('layout.layout')

@section('title')
    Stations: Show
@endsection

@section('content')
    <div class="large-12 medium-12 small-12">
        <div class="box box-content">
            <div class="box-header">
                <h3 class="box-title">

                </h3>
            </div>
            <div class="box-body">
                <a href="/station/{{$station->id}}/image">
                    <img src="/station/{{$station->id}}/image" alt="{{$station->name}}_{{$station->date_taken}}"/>
                </a>
                <table>
                    <tbody>
                    <tr>
                        <th scope="col">Station</th>
                        <td>{{ucwords(str_replace('_', ' ', $station->name))}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Date</th>
                        <td>{{$station->date_taken}}</td>
                    </tr>
                    <tr>
                        <th scope="col">River</th>
                        <td>{{ucwords(str_replace('_', ' ', $station->river_focus))}}</td>
                    </tr>
                    </tbody>
                </table>
                <form action="/station/{{$station->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href='{{url("/station/{$station->id}/edit")}}' class="button success">Edit</a>
                    <button type="submit" class="button alert">Delete</button>
                </form>
                <a href='{{URL::to("/station/{$station->name}")}}' class="button">Return to {{ucwords(str_replace('_', ' ', $station->name))}}</a>
            </div>
        </div>
    </div>
@endsection
