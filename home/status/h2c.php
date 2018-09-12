<?php require 'SH_connect_to_db.php';?>
<?php session_start();?>
<?php
//SELECT * FROM student_profiles LEFT JOIN signinrecords ON student_profiles.student = signinrecords.student WHERE student_profiles.dorm = 'B3' AND signinrecords.sign_ts IS NULL AND signinrecords.confirmed_by IS NULL
if ($_SESSION["location"] != "DA") {
  $query="SELECT * FROM signins INNER JOIN student_faculty ON student_faculty.user_ID = signins.user_id
  WHERE signins.location2 = '".$_SESSION["location"]."'
  AND signins.date = CURRENT_DATE AND signins.sign_ts IS NOT NULL AND signins.confirm2 IS NOT NULL AND signins.confirm_ts_2 IS NOT NULL";

  $result = mysqli_query($mysqli, $query);
      if ($result->num_rows > 0)
      {
        ?>

      <tr>
        <td><h4>Student Name</h4></td>
        <td><h4>Time Signed In</h4></td>
        <td><h4>Confirmed by</h4></td>
        <td><h4>Time Confirmed</h4></td>

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
              <?php echo $row["sign_ts"];?>
            </td>
            <td>
              <?php echo $row["confirm2"]; ?>
            </td>
            <td>
              <?php echo $row["confirm_ts_2"];?>
            </td>
          </tr>
            <?php
        }
      }
      else {
        echo "No one is confirmed to be on dorm";
      }
  }
  else {
    $query="SELECT * FROM signins INNER JOIN student_faculty ON student_faculty.user_ID = signins.user_ID
    WHERE signins.date = CURRENT_DATE
    AND signins.sign_ts IS NOT NULL AND signins.confirm2 IS NOT NULL AND signins.confirm_ts_2 IS NOT NULL";

    $result = mysqli_query($mysqli, $query);
        if ($result->num_rows > 0)
        {
          ?>

        <tr>
          <td><h4>Student Name</h4></td>
          <td><h4>Location</h4></td>
          <td><h4>Time Signed In</h4></td>
          <td><h4>Confirmed by</h4></td>
          <td><h4>Time Confirmed</h4></td>
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
                <?php echo $row["location2"]; ?>
              </td>
              <td>
                <?php echo $row["sign_ts"];?>
              </td>
              <td>
                <?php echo $row["confirm2"]; ?>
              </td>
              <td>
                <?php echo $row["confirm_ts_2"];?>
              </td>
            </tr>
              <?php
          }
        }
        else {
          echo "No one is confirmed to be on dorm";
        }
  }
?>
