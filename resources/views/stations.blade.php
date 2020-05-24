<?  //Monitoring station tables
    //Displays table for selected location
    //Single database table for each datatype eg. images, fauna, flora
    //Display data only pertaining to one location eg. SELECT * FROM images WHERE location = 'dumbarton'
 ?>
@extends ('layout.layout')

@section ('content')

    <div class="large-12 medium-12 small-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    <span>{{ ucwords(str_replace('_',' ',$name)) }} Monitoring Station</span>
                </h3>
            </div>
            <div class="box-body">
                <table>
                    <tr><th>Date</th><th>Photo orientation</th><th>Image</th><th>Edit</th><th>Delete</th></tr>
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
