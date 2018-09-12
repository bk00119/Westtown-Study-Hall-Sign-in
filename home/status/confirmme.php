<?php
// append 1st half sign-in record from student interface to the database

require 'SH_connect_to_db.php';

$adminName = $_POST['admin'];
$recordid = $_POST['record_id'];
$periodNum = $_POST['period'];

// insert the first half selection into the database
$insert = "UPDATE signins
 SET
 confirm$periodNum = '$adminName',
 confirm_ts_$periodNum = CURRENT_TIMESTAMP()
 WHERE record_id = $recordid";

if ($mysqli->query($insert) === TRUE) {
    echo "ok";
} else {
    echo "Error";
}

?>
