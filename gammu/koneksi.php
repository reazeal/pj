<?php
include 'db.php';
mysqli_connect('localhost', $dbuser, $dbpass);
$mysqli = new mysqli("localhost", $dbuser, $dbpass, $dbname);
mysqli_select_db($dbname);
?>