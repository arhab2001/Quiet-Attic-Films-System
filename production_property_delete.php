<?php
require_once('database/DBConnection.php');
$Id = $_GET['del'];
$SQL = "DELETE FROM `production_property` WHERE production_propertyID = '$Id'";

global $DBConnect;
if(mysqli_query($DBConnect,$SQL)){
    echo'<script> location.replace("production_property.php")</script>';
}else {
    echo "Some thing Error" .$DBConnect->error;
}
