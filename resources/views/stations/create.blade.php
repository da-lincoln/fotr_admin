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
                <form method="POST" action="/station">
                    @csrf
                    <div class="form-group">
                        <label for="stationName">Station</label>
                        <select name="stationName" required>
                            <option hidden disabled selected value>Select one</option>
                            <option value="dumbartion">Dumbarton</option>
                            <option value="millards_pool">Millards Pool</option>
                            <option value="lloyds_reserve">Lloyds Reserve</option>
                            <option value="goomalling_bridge">Goomalling Bridge</option>
                            <option value="boyagerring_brook">Boyagerring Brook</option>
                            <option value="newcastle_bridge">Newcastle Bridge</option>
                            <option value="slaughterhouse_bridge">Slaughterhouse Bridge</option>
                            <option value="weatherall_reserve">Weatherall Reserve</option>
                        </select>
                        <label for="stationDate">Date</label>
                        <input class="date-input" type="date" name="stationDate" required>
                        <label for="stationImage">Photo</label>
                        <input type="file" name="stationImage" required>
                        <label for="stationRiver">River</label>
                        <select name="stationRiver" required>
                            <option hidden disabled selected value>Select one</option>
                            <option value="river">River</option>
                            <option value="upstream">Upstream</option>
                            <option value="floodplain">Floodplain</option>
                            <option value="downstream">Downstream</option>
                        </select>
                        <button type="submit" class="button" name="add">Submit</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
