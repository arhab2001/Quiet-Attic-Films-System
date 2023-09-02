<?php
require_once('database/DBConnection.php');
$Id = $_GET['del'];
$SQL = "DELETE FROM `location` WHERE locationID = '$Id'";

global $DBConnect;
if(mysqli_query($DBConnect,$SQL)){
    echo'<script> location.replace("location.php")</script>';
}else {
    echo "Some thing Error" .$DBConnect->error;
}
