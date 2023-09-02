<?php
require_once('database/DBConnection.php');
$Id = $_GET['del'];
$SQL = "DELETE FROM `client` WHERE clientID = '$Id'";

global $DBConnect;
if(mysqli_query($DBConnect,$SQL)){
    echo'<script> location.replace("client.php")</script>';
}else {
    echo "Some thing Error" .$DBConnect->error;
}
