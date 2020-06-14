@extends('layout.layout')

@section('title')
    Stations: Create
@endsection

@section('content')
    <div class="large-12 medium-12 small-12">
        <div class="box box-content" >
            <div class="box-header">
                <h3 class="box-title">
                    <span>New Entry</span>
                </h3>
            </div>
            <div class="box-body">
                <form method="POST" action="/station/{{$name}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <h3>{{ucwords(str_replace('_',' ',$name))}}</h3>
                        <input type="hidden" readonly name="stationName" value="{{$name}}">
                        <label for="stationDate">Date</label>
                        <input class="date-input" type="date" name="stationDate" required>
                        <label for="stationImage">Photo</label>
                        <input type="file" name="stationImage" >
                        <label for="stationRiver">River</label>
                        <select name="stationRiver" required>
                            <option hidden disabled selected value>Select one</option>
                            <option value="river">River</option>
                            <option value="upstream">Upstream</option>
                            <option value="floodplain">Floodplain</option>
                            <option value="downstream">Downstream</option>
                        </select>
                        <button type="submit" class="button">Submit</button>
                        <a href="/station/{{$name}}" class="button">Cancel</a>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
