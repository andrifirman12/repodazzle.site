<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_dazzle";
$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_error()) {
 echo 'Failed to Connect Database : '.mysqli_connect_error();
}

?>