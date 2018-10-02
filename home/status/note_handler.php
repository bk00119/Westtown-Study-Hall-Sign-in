<?php
session_start();
require 'SH_connect_to_db.php';
date_default_timezone_set('America/New_York');

//$_SESSION["note"] = $_POST['note'];

//echo $_SESSION["note"];




//$note = $_SESSION["note"];
//$user = $_SESSION["user_ID"];
$note = $_POST['note'];
$user = $_POST['user_id'];


//This makes it crash...


$insert = "INSERT INTO test.notes
(user_id, notes, time, date)
VALUES ($user, '$note', CURRENT_TIMESTAMP(), CURRENT_DATE())";

$mysqli->query($insert);



?>
