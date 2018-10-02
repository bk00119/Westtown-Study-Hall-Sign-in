<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="../../icon" href="images/icon.png">
    <title>Sign-In Faculty</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="note.css" type="text/css" rel="stylesheet">

<?php
require 'SH_connect_to_db.php';
session_start();
date_default_timezone_set('America/New_York');
?>
</head>

<body>
  <?php require 'nav.php'; ?>
  <div class="container" style="margin-top: 50px;">
    <h2>Note</h2>
    <div class="chatbox">
        <?php
        $query="SELECT*FROM test.notes WHERE date = CURRENT_DATE()";
        $result = mysqli_query($mysqli, $query);

        ?>
        <table col width=100% id='note'>
        <?php
        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            ?>
            <tr id='note_row'>
              <td id='note_content'>
                <?php echo $row['notes']; ?>
              </td>
              <td id='note_time'>
                <?php echo date('D h:i a', strtotime($row['time']));  ?>
              </td>
            </tr>
            <?php
          }
        }
        ?>
        </table>
        <br><br>
        <form method="post" id="textbox">
            <input type="text" id="message" placeholder='Type'>
            <input type="submit" form="textbox" onClick="note()" color="#263238"></input>
            <br>
        </form>
        <!-- <button type="button" form="textbox" class="btn btn-lg btn-info" onClick="note()" color="#263238">text</button> -->

        <script>
          function note(){
            if (message.value == "") {
              alert ("please type");
            } else {
              var note_data = {
                'note': message.value,
                'user_id': "<?php echo $_SESSION["user_ID"]; ?>"
              };

              jQuery.ajax({
                type: "POST",
                url: "note_handler.php",
                dataType: 'html',
                data: note_data,
                success: function(response) {
                  //alert("sucess");
                  window.location.reload(true);
                }
              });

            }
          }
        </script>

      <?php

      $note = $_SESSION['note'];
      $user = $_SESSION['user_ID'];
      echo $_SESSION['note'];

      //require '../../../not.php';
      ?>


    </div>
  </div>
</body>
</html>
