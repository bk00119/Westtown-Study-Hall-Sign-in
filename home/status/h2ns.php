<?php require 'SH_connect_to_db.php';?>
<?php session_start();

if ($_SESSION["location"] != "DA") {
  $query="SELECT firstname, lastname, dorm, dorm_room FROM
(SELECT * FROM signins
WHERE DATE(`date`) = CURRENT_DATE()) temp
RIGHT JOIN test.`users`
ON temp.user_id = `users`.`user_ID`
WHERE `users`.dorm = '".$_SESSION["location"]."'
AND temp.confirm_ts_2 IS NULL
AND temp.sign_ts IS NULL
AND `users`.name <> ''";
    $result = mysqli_query($mysqli, $query);
    if ($result->num_rows > 0)
    {echo" <tr>
        <td><h4>Student Name</h4></td>
        <td><h4>Room</h4></td>
      </tr>";
      while($row = $result->fetch_assoc())
      {
        echo "<tr>";
        echo "<td>" . $row["firstname"] . " " . $row["lastname"] . "</td><td>" .  $row["dorm_room"] . "</td></tr>";
      }
    }
    else {
      echo "Everyone has signed in";
    }
}
else {
  $query = "SELECT firstname, lastname, dorm, dorm_room FROM
(SELECT * FROM signins
WHERE DATE(`date`) = CURRENT_DATE()) temp
RIGHT JOIN test.`users`
ON temp.user_id = `users`.`user_ID`
WHERE `users`.dorm <> 'day'
AND temp.confirm_ts_2 IS NULL
AND temp.sign_ts IS NULL
AND `users`.name <> ''
ORDER BY `users`.dorm";

  $result = mysqli_query($mysqli, $query);
  if ($result->num_rows > 0)
  {echo" <tr>
      <td><h4>Student Name</h4></td>
      <td><h4>Dorm</h4></td>
    </tr>";
    while($row = $result->fetch_assoc())
    {
      echo "<tr>";
      echo "<td>" . $row["firstname"] . " " . $row["lastname"] . "</td><td>" .  $row["dorm"] . "</td></tr>";
    }
  }
  else {
    echo "Everyone has signed in";
  }
}

?>
