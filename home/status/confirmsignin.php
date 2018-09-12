<?php
// append 1st half sign-in record from student interface to the database

require 'connect_to_db.php';

//$selection1st = $_POST['dropdown1st'];

// insert the first half selection into the database
$confirmupdate = "UPDATE `signinrecords` SET `confirmed_by`= 'Tom Gilbert' WHERE `timestamp_SI`= '2018-02-10 20:19:00 000000' ";

if ($mysqli->query($confirmupdate) === TRUE) {
    echo "<p>This student sign-in was confirmed</p><br>";
} else {
    echo "Error updating database: " . $mysqli->error;
}

?>
