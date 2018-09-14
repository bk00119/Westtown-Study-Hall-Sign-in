<?php require 'SH_connect_to_db.php';?>
<?php session_start();?>
<?php
//SELECT * FROM student_profiles LEFT JOIN signinrecords ON student_profiles.student = signinrecords.student WHERE student_profiles.dorm = 'B3' AND signinrecords.sign_ts IS NULL AND signinrecords.confirmed_by IS NULL
date_default_timezone_set('America/New_York');

if ($_SESSION["location"] != "DA")  {
  $query="SELECT * FROM signins INNER JOIN users ON users.user_ID = signins.user_id
  WHERE signins.location1 = '".$_SESSION["location"]."'
  AND signins.date = CURRENT_DATE AND signins.sign_ts IS NOT NULL AND signins.confirm_ts_1 IS NULL";

  $result = mysqli_query($mysqli, $query);

      if ($result->num_rows > 0){
        ?>
      <tr>
        <td><h4>Student Name</h4></td>
        <td><h4>Room</h4></td>
        <td><h4>Time Signed In</h4></td>
      </tr>
      <?php
        while($row = $result->fetch_assoc())
        {
          ?>
          <tr>
            <td>
              <?php echo $row["firstname"] . " " . $row["lastname"]; ?>
            </td>
            <td>
              <?php echo $row["dorm_room"];?>
            </td>
            <td>
              <?php echo $row["sign_ts"];?>
            </td>
            <td>
              <button type="button" onclick="confirm_SI(<?php echo $row["record_id"];?>, 1)">Confirm</button>
            </td>
          </tr>
            <?php
        }
      }
      else {
        echo "No one has signed in to be on dorm";
      }
  }
  else {
    $query="SELECT * FROM signins INNER JOIN users
    ON users.user_ID = signins.user_ID
    WHERE signins.date = CURRENT_DATE
    AND signins.sign_ts IS NOT NULL AND signins.confirm_ts_1 IS NULL";
    $result = mysqli_query($mysqli, $query);
    if ($result->num_rows > 0){
      ?>
    <tr>
      <td><h4>Student Name</h4></td>
      <td><h4>Location</h4></td>
      <td><h4>Time Signed In</h4></td>
    </tr>
    <?php
      while($row = $result->fetch_assoc())
      {
        ?>
        <tr>
          <td>
            <?php echo $row["firstname"] . " " . $row["lastname"]; ?>
          </td>
          <td>
            <?php echo $row["location1"];?>
          </td>
          <td>
            <?php echo $row["sign_ts"];?>
          </td>
          <td>
            <button type="button" onclick="confirm_SI(<?php echo $row["record_id"];?>, 1)">Confirm</button>
          </td>
        </tr>
          <?php
      }
    }
    else {
      echo "No one has signed in to be on dorm";
    }
  }
?>
