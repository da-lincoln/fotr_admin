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
                <a href="" class="button">New Entry</a>
                <table>
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Photo orientation</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($station as $stations)
                        <tr>
                            <td>{{$stations->created_at}}</td>
                            <td>{{$stations->river_focus}}</td>
                            <td>{{$stations->image}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>

                    <tr>
                        <td>date</td>
                        <td>location</td>
                        <td><a href="#">Link</a></td>
                        <td><a href="#">Edit</a></td>
                        <td><a href="#" onclick="return confirm('Are you sure you wish to delete this entry?');">Delete</a></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="box box-content" >
            <div class="box-header">
                <h3 class="box-title">
                    <span>New Entry</span>
                </h3>
            </div>
            <div class="box-body">
                <form method="POST" enctype="multipart/form-data">
                    <input class="date-input" type="datetime-local" name="date" required>
                    <input type="file" name="image" required>
                    <select name="location" required>
                        <option hidden disabled selected value>Select one</option>
                        <option value="river">River</option>
                        <option value="upstream">Upstream</option>
                        <option value="floodplain">Floodplain</option>
                        <option value="downstream">Downstream</option>
                    </select>

                    <input type="submit" class="button" value="ADD" name="add">
                </form>
            </div>
        </div>
    </div>
@endsection
