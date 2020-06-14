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
                        <label for="stationName">Station</label>
                        <select name="stationName" required>
                            <option value="0">Select one</option>
                            <option value="dumbarton" <?php if($name=="dumbarton") echo 'selected="selected"'; ?> >Dumbarton</option>
                            <option value="millards_pool" <?php if($name=="millards_pool") echo 'selected="selected"'; ?> >Millards Pool</option>
                            <option value="lloyds_reserve" <?php if($name=="lloyds_reserve") echo 'selected="selected"'; ?> >Lloyds Reserve</option>
                            <option value="goomalling_bridge" <?php if($name=="goomalling_bridge") echo 'selected="selected"'; ?> >Goomalling Bridge</option>
                            <option value="boyagerring_brook" <?php if($name=="boyagerring_brook") echo 'selected="selected"'; ?> >Boyagerring Brook</option>
                            <option value="newcastle_bridge" <?php if($name=="newcastle_bridge") echo 'selected="selected"'; ?> >Newcastle Bridge</option>
                            <option value="slaughterhouse_bridge" <?php if($name=="slaughterhouse_bridge") echo 'selected="selected"'; ?> >Slaughterhouse Bridge</option>
                            <option value="weatherall_reserve" <?php if($name=="weatherall_reserve") echo 'selected="selected"'; ?> >Weatherall Reserve</option>
                        </select>
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
                        <button type="submit" class="button success">Submit</button>
                        <a href="/station/{{$name}}" class="button alert">Cancel</a>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
