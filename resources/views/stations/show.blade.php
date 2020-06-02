@extends('layout.layout')

@section('title')
    Stations: Show
@endsection

@section('content')
    <div class="large-12 medium-12 small-12">
        <div class="box box-content">
            <div class="box-header">
                <h3 class="box-title">
                    <span>Station: Show Station Status</span>
                </h3>
            </div>
            <div class="box-body">
                <table>
                    <tbody>
                    <tr>
                        <th scope="col">Station</th>
                        <td>{{$station->name}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Date</th>
                        <td>{{$station->date_taken}}</td>
                    </tr>
                    <tr>
                        <th scope="col">River</th>
                        <td>{{$station->river_focus}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Photo</th>
                        <td>{{$station->image}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
