<html lang="en">
<?php
session_start();
?>
  <head>
    <?php
    require 'googleapi.php';
    ?>
  </head>
  <body>

<?php
require 'home/status/SH_connect_to_db.php';
$email = $_SESSION["email"];
$emailValue = "SELECT * FROM test.`student_faculty` WHERE email ='".$email."'";
$positionValue = "SELECT position FROM test.`student_faculty` WHERE email ='".$email."'";
$result = mysqli_query($mysqli, $emailValue);

echo $positionResult;

if ($result->num_rows > 0)
{
  while($row = $result->fetch_assoc()) {
    //echo $row["position"];
    $_SESSION["user_ID"] = $row['user_ID'];
    $_SESSION["position"] = $row['position'];
    $_SESSION["dorm"] = $row['dorm'];

    if ($row["position"] == 's') {
      header('Location: http://signin.westtown.edu/home/index.php');
    }
    elseif ($row["position"] == 'pr') {
      ?><script>
      if (window.confirm("Do you want to sign in for Study Hall?")) {
        window.location.href = "http://signin.westtown.edu/home/index.php";
      //('Location: http://signin.westtown.edu/home/signin.php');
      }
      else {
        window.location.href = "http://signin.westtown.edu/home/status/index.php";

        //header('Location: http://signin.westtown.edu/home/SH_test.php');
      }
      </script><?php
    }
    elseif ($row["position"] == 'f' or 'F') {
      header('Location: http://signin.westtown.edu/home/status/index.php');
    }
    else {
      echo "Who are you...";
      echo $row["position"];
      echo $row["email"];
      echo $row["user_ID"];
    }
  }
}

else {
  die('Could not connect '.mysql_error());
}
?>
</body>
</html>
