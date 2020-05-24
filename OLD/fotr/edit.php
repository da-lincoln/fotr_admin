<?php
/*******************************************************
 * Project:     fotr
 * File:        edit.php
 * Author:      Your name
 * Date:        2020-05-20
 * Version:     1.0.0
 * Description:
 *******************************************************/


require('db.php');
include('auth.php');
$station=$_REQUEST['t'];
$id=$_REQUEST['id'];
$query="SELECT * FROM monitoring_stations WHERE id=$id";
$result=$conn->query($query) or die($conn->connect_error);
$row = $result->fetch_assoc();
$date = date("Y-m-d\TH:i:s", strtotime($row['date']));
$image = $row['image'];
$location = $row['location'];
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Friends of the River</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/foundation.css">

</head>
<body>
<div class="grid-y grid-frame">
    <div class="grid-x">
        <aside class="cell">
            <div class="logo">

            </div>
            <ul class="sidebar-list">
                <li><a href="/"><span>DASHBOARD</span></a></li>
                <li class="header"><span>Monitoring Stations</span></li>
                <li><a href="view.php?t=dumbarton"><span>Dumbarton</span></a></li>
                <li><a href="view.php?t=millards_pool"><span>Millards Pool</span></a></li>
                <li><a href="view.php?t=lloyds_reserve"><span>Lloyds Reserve</span></a></li>
                <li><a href="view.php?t=goomalling_bridge"><span>Goomalling Bridge</span></a></li>
                <li><a href="view.php?t=boyagerring_brook"><span>Boyagerring Brook</span></a></li>
                <li><a href="view.php?t=newcastle_bridge"><span>Newcastle Bridge</span></a></li>
                <li><a href="view.php?t=slaughterhouse_bridge"><span>Slaughterhouse Bridge</span></a></li>
                <li><a href="view.php?t=weatherall_reserve"><span>Weatherall Reserve</span></a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </aside>
    </div>
    <div class="grid-x content" style="height: 100%;">

        <div class="cell">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <span>Update Record</span>
                    </h3>
                </div>
                <div class="box-body">
                    <?php
                        if(isset($_POST['new'])&& $_POST['new']==1){
                            $id=$_REQUEST['id'];
                            $date=$_REQUEST['date'];
                            $location=$_REQUEST['location'];

                            $target_dir = "images/$station/";
                            $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                            $source = $_FILES["image"]["name"];
                            $dateformat = date_format(date_create($date), "dmY");
                            $basename = $dateformat.'-'.$location.'-'.uniqid().'.'.$extension;
                            $target_file = $target_dir.$basename;
                            move_uploaded_file($_FILES["image"]["tmp_name"],$target_dir.$basename);


                            if($_FILES['image']['error']==4){
                                $update="UPDATE monitoring_stations SET date='$date', location='$location' WHERE id='$id'";
                            } else {
                                $update="UPDATE monitoring_stations SET date='$date', location='$location', image='$target_file' WHERE id='$id'";
                            }
                            $conn->query($update) or die($conn->connect_error);

                            header("Location: /view.php?t=$station");

                        } else {
                    ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div>
                            <img src="<?php echo $image ?>"/>
                        </div>
                        <input type="hidden" name="new" value="1">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        <input type="datetime-local" name="date" required value="<?php echo $date;?>">
                        <select name="location" required>
                            <option <?php if($location=='river'){echo("selected");}?> value="river">River</option>
                            <option <?php if($location=='upstream'){echo("selected");}?> value="upstream">Upstream</option>
                            <option <?php if($location=='floodplain'){echo("selected");}?> value="floodplain">Floodplain</option>
                            <option <?php if($location=='downstream'){echo("selected");}?> value="downstream">Downstream</option>
                        </select>
                        <input type="file" name="image"/>
                        <input type="submit" name="submit" value="Update"/>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/vendor.js"></script>
<script src="assets/js/foundation.js"></script>
</body>
</html>



