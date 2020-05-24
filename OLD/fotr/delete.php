<?php

require('db.php');
include('auth.php');
$id=$_REQUEST['id'];
$station=$_REQUEST['t'];

$query = "SELECT * FROM monitoring_stations WHERE id='".$id."'";
$selStmt = $conn->query($query);
if($selResult = $selStmt->fetch_assoc()){
    $delQuery = "DELETE FROM monitoring_stations WHERE  id=$id";
    $delResult = $conn->query($delQuery);
    $delPath = $selResult['image'];
    unlink($delPath);
    header('Location: /view.php?t='.$station.'');
}
