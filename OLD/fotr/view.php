<?php
require('db.php');
include('auth.php');

$table = htmlspecialchars($_GET["t"]);
$title = ucwords(str_replace('_',' ',$table));
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
<div class="grid-y grid-frame wrapper ">
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
        <div class="large-12 ">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <span><?php echo $title ?> Monitoring Station</span>
                    </h3>
                </div>
                <div class="box-body">
                    <table>
                        <tr><th>Date</th><th>Photo orientation</th><th>Image</th><th>Edit</th><th>Delete</th></tr>
                        <?php
                            $sql = "SELECT * FROM monitoring_stations WHERE station='$table'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                //output
                                while ($row = $result->fetch_assoc()) {?>
                                    <tr>
                                        <td><?php echo $row["date"];?></td>
                                        <td><?php echo $row["location"]?></td>
                                        <td><a href="<?php echo $row["image"]; ?>">Link</a></td>
                                        <td><a href="edit.php?t=<?php echo $table?>&id=<?php echo $row["id"];?>">Edit</a></td>
                                        <td><a href="delete.php?t=<?php echo $table?>&id=<?php echo $row['id'];?>">Delete</a></td>
                                    </tr>
                                <?php } }?>
                    </table>
                </div>
            </div>
            <div class="box" >
                <div class="box-header">
                    <h3 class="box-title">
                        <span>New Entry</span>
                    </h3>
                </div>
                <div class="box-body">
                    <?php
                        if(isset($_POST['add'])){
                            $date = $_POST['date'];
                            $location = $_POST['location'];
                            $target_dir = "images/$table/";
                            $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                            $source = $_FILES["image"]["name"];
                            $dateformat = date_format(date_create($date), "dmY");
                            $basename = $dateformat.'-'.$location.'-'.uniqid().'.'.$extension;
                            $target_file = $target_dir.$basename;
                            move_uploaded_file($_FILES["image"]["tmp_name"],$target_dir.$basename);

                            $sql = "INSERT INTO monitoring_stations (station, date, image,location) VALUES ('$table','$date','$target_file','$location')";
                            $conn->query($sql) or die($conn->connect_error);

                            echo "<meta http-equiv='refresh' content='0'>";
                    } ?>
                    <form method="POST"  enctype="multipart/form-data">
                        <table>
                            <tbody>
                            <tr><th>Date</th><th>Image</th><th>Photo orientation</th></tr>
                            <tr>
                                <td><input type="datetime-local" name="date" required></td>
                                <td><input type="file" name="image" required></td>
                                <td>
                                    <select name="location" required>
                                        <option hidden disabled selected value>Select one</option>
                                        <option value="river">River</option>
                                        <option value="upstream">Upstream</option>
                                        <option value="floodplain">Floodplain</option>
                                        <option value="downstream">Downstream</option>
                                    </select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <input type="submit" class="button" value="ADD" name="add">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/vendor.js"></script>
<script src="assets/js/foundation.js"></script>
</body>
</html>
