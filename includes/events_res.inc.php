<?php
//events.inc.php

header("Access-Control_Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require './database_connection.inc.php';

$sql = "SELECT EventName, EventTime, EventPlace, EventImgDir, ResImgName FROM events";
$result = $con -> query($sql);
$output = "";

while($row = $result -> fetch_array(MYSQLI_ASSOC)) {
	if ($output != "") {$output .= ",";}
	$output .= '{"eventName":"' . $row["EventName"] . '",';
	$output .= '"eventTime":"' . $row["EventTime"] . '",';
	$output .= '"eventPlace":"' . $row["EventPlace"]  . '",';
	$output .= '"eventImgSrc":"' . $row["EventImgDir"] . $row["ResImgName"] . '",';
	$output .= '"eventImgName":"' . $row["ResImgName"] . '"}';
}

$output = '{"events_data":[' . $output . ']}';

$con -> close();

echo ($output);