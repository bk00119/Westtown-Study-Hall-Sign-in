<?php
// append 1st half sign-in record from student interface to the database

require 'SH_connect_to_db.php';

$selection1st = $_POST['dropdown1st'];

// insert the first half selection into the database
$rand_draw = "INSERT INTO `studyhallsignin`.`sign_in_records`
(`record_ID`, `date`, `student`, `last_name`, `location`, `period`, `timestamp_SI`, `confirmed_by`, `timestamp_C`)
 VALUES (NULL, CURRENT_DATE(), 'Daelan Roosa', 'Roosa', '$selection1st', '1', CURRENT_TIME(), NULL, NULL)";

if ($mysqli->query($rand_draw) === TRUE) {
    echo "<p>The query ran; now back up and click the 2nd half Submit button</p><br>";
} else {
    echo "Error updating database: " . $mysqli->error;
}

?>
