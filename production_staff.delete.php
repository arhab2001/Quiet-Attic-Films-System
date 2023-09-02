<?php
require_once('database/DBConnection.php');
$Id = $_GET['del'];
$SQL = "DELETE FROM `production_staff` WHERE production_staffID = '$Id'";

global $DBConnect;
if(mysqli_query($DBConnect,$SQL)){
    echo'<script> location.replace("production_staff.php")</script>';
}else {
    echo "Some thing Error" .$DBConnect->error;
}
