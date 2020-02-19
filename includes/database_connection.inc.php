<?php
//database_connection.inc.php

$servername = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'show_flow';
$con = mysqli_connect($servername, $db_username, $db_password, $db_name);

if (!$con) {
	die('Connection to server failed: ' . mysqli_connect_error());
}