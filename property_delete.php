<?php
require_once('database/DBConnection.php');
$Id = $_GET['del'];
$SQL = "DELETE FROM `property` WHERE propertyID = '$Id'";

global $DBConnect;
if(mysqli_query($DBConnect,$SQL)){
    echo'<script> location.replace("property.php")</script>';
}else {
    echo "Some thing Error" .$DBConnect->error;
}
