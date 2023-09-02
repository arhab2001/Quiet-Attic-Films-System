<?php
require_once('database/DBConnection.php');
$Id = $_GET['del'];
$SQL = "DELETE FROM `production_location` WHERE production_locationID = '$Id'";

global $DBConnect;
if(mysqli_query($DBConnect,$SQL)){
    echo'<script> location.replace("production_location.php")</script>';
}else {
    echo "Some thing Error" .$DBConnect->error;
}
