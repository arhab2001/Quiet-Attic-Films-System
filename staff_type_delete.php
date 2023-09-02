<?php
require_once('database/DBConnection.php');
$Id = $_GET['del'];
$SQL = "DELETE FROM `staff_type` WHERE staff_typeID = '$Id'";

global $DBConnect;
if(mysqli_query($DBConnect,$SQL)){
    echo'<script> location.replace("staff_type.php")</script>';
}else {
    echo "Some thing Error" .$DBConnect->error;
}