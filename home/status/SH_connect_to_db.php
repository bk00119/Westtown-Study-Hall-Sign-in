<?php
/* connect to database */

$mysqli = new mysqli("localhost", "root", "mysql", "test");
/* check connection */
if (!$mysqli) {
  die('Could not connect '.mysql_error());
}
//echo 'Connected successfully to mySQL.<br>';
//return $mysqli;
?>
