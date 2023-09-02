<?php
require_once('database/DBConnection.php');
$Id = $_GET['del'];
$SQL = "DELETE FROM `production` WHERE productionID = '$Id'";

global $DBConnect;
if(mysqli_query($DBConnect,$SQL)){
    echo'<script> location.replace("production.php")</script>';
}else {
    echo "Some thing Error" .$DBConnect->error;
}
