@extends('layout.layout')

@section('title')
    Stations: Edit
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
                <form method="POST" action="/station/{{$station->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="stationName">Station</label>
                        <select name="stationName" required>
                            <option value="0">Select one</option>
                            <option value="dumbarton" <?php if($station->name=="dumbarton") echo 'selected="selected"'; ?> >Dumbarton</option>
                            <option value="millards_pool" <?php if($station->name=="millards_pool") echo 'selected="selected"'; ?> >Millards Pool</option>
                            <option value="lloyds_reserve" <?php if($station->name=="lloyds_reserve") echo 'selected="selected"'; ?> >Lloyds Reserve</option>
                            <option value="goomalling_bridge" <?php if($station->name=="goomalling_bridge") echo 'selected="selected"'; ?> >Goomalling Bridge</option>
                            <option value="boyagerring_brook" <?php if($station->name=="boyagerring_brook") echo 'selected="selected"'; ?> >Boyagerring Brook</option>
                            <option value="newcastle_bridge" <?php if($station->name=="newcastle_bridge") echo 'selected="selected"'; ?> >Newcastle Bridge</option>
                            <option value="slaughterhouse_bridge" <?php if($station->name=="slaughterhouse_bridge") echo 'selected="selected"'; ?> >Slaughterhouse Bridge</option>
                            <option value="weatherall_reserve" <?php if($station->name=="weatherall_reserve") echo 'selected="selected"'; ?> >Weatherall Reserve</option>
                        </select>
                        <label for="stationDate">Date</label>
                        <input class="date-input" type="date" name="stationDate"  value="{{date('Y-m-d',strtotime($station->date_taken))}}">
                        <label for="stationImage">Photo</label>
                        <img src="/station/{{$station->id}}/image">
                        <input type="file" name="stationImage">
                        <label for="stationRiver">River</label>
                        <select name="stationRiver" required>
                            <option value="0">Select one</option>
                            <option value="river" <?php if($station->river_focus=="river") echo 'selected="selected"'; ?> >River</option>
                            <option value="upstream" <?php if($station->river_focus=="upstream") echo 'selected="selected"'; ?> >Upstream</option>
                            <option value="floodplain" <?php if($station->river_focus=="floodplain") echo 'selected="selected"'; ?> >Floodplain</option>
                            <option value="downstream" <?php if($station->river_focus=="downstream") echo 'selected="selected"'; ?> >Downstream</option>
                        </select>
                        <button type="submit" class="button">Submit</button>
                        <a href="/station/{{$station->name}}" class="button">Cancel</a>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
