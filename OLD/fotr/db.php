<?php
$conn = new mysqli('localhost', 'root', null, 'mydb');
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}