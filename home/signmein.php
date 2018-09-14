<?php
session_start();
require 'status/SH_connect_to_db.php';
date_default_timezone_set('America/New_York');

$query = "SELECT*FROM users WHERE user_id = '".$_SESSION["user_ID"]."'";
$result = mysqli_query($mysqli, $query);
$check = "SELECT*FROM signins WHERE user_id = '".$_SESSION["user_ID"]."' AND signins.date = CURRENT_DATE()";
$checkResult = mysqli_query($mysqli, $check);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if (date("Hi") >= 1925){
        $selection1st = $_SESSION["dorm"];
        $selection2nd = $_POST['l2'];
      }
      else {
        $selection1st = $_POST['l1'];
        $selection2nd = $_POST['l2'];
      }
      while ($row = $checkResult->fetch_assoc()) {
        if($row["confirm1"] != NULL) { //when the first half confirmed
          $selection1st = $row["location1"];
          $selection2nd = $_POST['l2'];
        }
      }
  }
  }
$user = $_POST['id'];

// insert the first half selection into the database

if ($checkResult->num_rows == 0){
  $insert = "INSERT INTO `signins`
  (user_id, date, location1, location2, sign_ts)
   VALUES ($user, CURRENT_DATE(), '$selection1st', '$selection2nd', CURRENT_TIMESTAMP())";
} else {
  $change = "UPDATE signins SET location1 = '".$selection1st."', location2 = '".$selection2nd."'WHERE user_id = '".$user."' AND date = CURRENT_DATE()";
}

if ($mysqli->query($change) === true) {
  echo "ok";
}
elseif ($mysqli->query($insert) === true){
  echo "ok";
}
else {
  echo "error";
}
 //$query = $mysqli->prepare($insert);
 //$query->execute();
 ?>
