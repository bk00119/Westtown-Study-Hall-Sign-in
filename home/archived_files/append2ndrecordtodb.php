<?php
// append sign-in records from student interface to the database

require 'SH_connect_to_db.php';

$selection2nd = $_POST['dropdown2nd'];

// insert the second half selection into the database
$rand_draw = "INSERT INTO `studyhallsignin`.`sign_in_records`
(`record_ID`, `date`, `student`, `last_name`, `location`, `period`, `timestamp_SI`, `confirmed_by`, `timestamp_C`)
 VALUES (NULL, CURRENT_DATE(), 'Alina Zhao', 'Zhao', '$selection2nd', '2', CURRENT_TIME(), NULL, NULL)";

if ($mysqli->query($rand_draw) === TRUE) {
    echo "<p>The query ran; now you can check the database to see if new records were added.</p><br>";
} else {
    echo "Error updating database: " . $mysqli->error;
}

?>
