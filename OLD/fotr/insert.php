<?php
/*******************************************************
 * Project:     fotr
 * File:        insert.php
 * Author:      Your name
 * Date:        2020-05-20
 * Version:     1.0.0
 * Description:
 *******************************************************/

//header('Location: /view.php');

require('db.php');
$date = $conn->real_escape_string($_REQUEST['date']);
$location = $conn->real_escape_string($_REQUEST['location']);
$target_dir = "images/";
$extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
$source = $_FILES["image"]["name"];
$dateformat = date_format(date_create($date), "dmY");
$basename = $dateformat.'-'.$location.'-'.uniqid().'.'.$extension;
$target_file = $target_dir.$basename;
move_uploaded_file($_FILES["image"]["tmp_name"],$target_dir.$basename);

$sql = "INSERT INTO dumbarton (date, image,location) VALUES ('$date','$target_file','$location')";

if ($conn->query($sql) === true) {
    echo "O";
} else {
    echo "X";
}
$conn->close();
//exit();
return;
