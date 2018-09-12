<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="tabs.css" type="text/css" rel="stylesheet">
    <title>Sign-In Faculty</title>
    <link rel="icon" href="home/images/clipboard.png" width="50px">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php
require 'SH_connect_to_db.php';

session_start();
date_default_timezone_set('America/New_York');


?>

</head>
<body>
<?php include 'nav.php';?>

<?php
if (date("Hi") >= 0730 and date("Hi") < 2030){
?>

<div class="container" style="margin-top:50px">
  <?php /*<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <?php require 'scripts/B3_sample.php';?>
    </div>
  </div> */ ?>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#NS">Not Signed In</a></li>
    <li><a data-toglle="tab" href="#NC">Not Confirmed</a></li>
    <li><a data-toglle="tab" href="#Cf">Confirmed</a></li>
  </ul>
  <!--<ul class="nav nav-pills">
    <li class="active"><a href="#1">1st Half</a></li>
    <li><a data-toggle="pill" href="#2">2nd Half</a></li>
  </ul>-->
  <h2><?php
  echo "1st Half<br><br>";
  echo $_SESSION["location"];
  ?></h2>

  <div class="tab-content">
    <div id="NS" class="tab-pane fade in active">
      <h3>Not Signed In</h3>

      <table col width=100% id='h1-not-signed'>
        <script type="text/javascript">
        setInterval(function()
         {
           $('#h1-not-signed').load('h1ns.php');
         }, 1000);
        </script>
      </table>

    </div>

    <div id="NC" class="tab-pane fade in active">
      <h3>Not Confirmed</h3>
        <table col width=100% id='h1-not-confirmed'>
          <script>
          function confirm_SI(record_id, period){
            var data2= {
              'admin': "<?php echo $_SESSION["name"]; ?>",
              'record_id': record_id,
              'period': period
          };

            jQuery.ajax({
              type:"POST",
              url:"confirmme.php",
              dataType:'html',
              data:data2,

              success:function(response)
              {
                if (response == "ok"){
                  refr();
                }
                else{
                  alert("Failed!");
                }
              }
            });
          }

          setInterval(function()
           {
             $('#h1-not-confirmed').load('h1nc.php');
           }, 1000);
          </script>
        </table>
    </div>

    <div id="Cf" class="tab-pane fade in active">
      <h3>Confirmed</h3>
      <table col width=100% id='h1-confirmed'>
        <script>
        setInterval(function()
         {
           $('#h1-confirmed').load('h1c.php');
         }, 1000);
        </script>
      </table>
    </div>
  </div>
  <script>
    // Select all tabs
    $('.nav-tabs a').click(function(){
        $(this).tab('show');
    })

    //$('.nav-pills a').click(function(){
      //  $(this).tab('show');
    //})

    // Select tab by name
    $('.nav-tabs a[href="#NS"]').tab('show')

    // Select first tab
    $('.nav-tabs a:first').tab('show')

    // Select last tab
    $('.nav-tabs li:eq(1) a').tab('show')

    //CREATE PILLS' CODE HERE

    // Select tab by name

    $('.nav-tabs a').on('shown.bs.tab', function(event){
    var x = $(event.target).text();         // active tab
    var y = $(event.relatedTarget).text();  // previous tab
    });

  </script>

</div>

<?php
}
elseif (date("Hi")>= 2030 and date("Hi")<=2300) {
?>

<div class="container" style="margin-top:50px">
  <?php /*<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <?php require 'scripts/B3_sample.php';?>
    </div>
  </div> */ ?>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#NS">Not Signed In</a></li>
    <li><a data-toglle="tab" href="#NC">Not Confirmed</a></li>
    <li><a data-toglle="tab" href="#Cf">Confirmed</a></li>
  </ul>
  <!--<ul class="nav nav-pills">
    <li class="active"><a href="#1">1st Half</a></li>
    <li><a data-toggle="pill" href="#2">2nd Half</a></li>
  </ul>-->
  <h2><?php
  echo "2nd Half<br><br>";
  echo $_SESSION["location"];
  ?></h2>
  <div class="tab-content">
    <div id="NS" class="tab-pane fade in active">
      <h3>Not Signed In</h3>

      <table col width=100% id='h2-not-signed'>
        <script type="text/javascript">
        setInterval(function()
         {
           $('#h2-not-signed').load('h2ns.php');
         }, 1000);
        </script>
      </table>

    </div>

    <div id="NC" class="tab-pane fade in active">
      <h3>Not Confirmed</h3>
        <table col width=100% id='h2-not-confirmed'>
          <script>
          function confirm_SI(record_id, period){
            var data2= {
              'admin': "<?php echo $_SESSION["name"]; ?>",
              'record_id': record_id,
              'period': period
          };

            jQuery.ajax({
              type:"POST",
              url:"confirmme.php",
              dataType:'html',
              data:data2,

              success:function(response)
              {
                if (response == "ok"){
                  refr();
                }
                else{
                  alert("Failed!");
                }
              }
            });
          }

          setInterval(function()
           {
             $('#h2-not-confirmed').load('h2nc.php');
           }, 1000);
          </script>
        </table>
    </div>

    <div id="Cf" class="tab-pane fade in active">
      <h3>Confirmed</h3>
      <table col width=100% id='h2-confirmed'>
        <script>
        setInterval(function()
         {
           $('#h2-confirmed').load('h2c.php');
         }, 1000);
        </script>
      </table>
    </div>
  </div>
  <script>
    // Select all tabs
    $('.nav-tabs a').click(function(){
        $(this).tab('show');
    })

    //$('.nav-pills a').click(function(){
      //  $(this).tab('show');
    //})

    // Select tab by name
    $('.nav-tabs a[href="#NS"]').tab('show')

    // Select first tab
    $('.nav-tabs a:first').tab('show')

    // Select last tab
    $('.nav-tabs li:eq(1) a').tab('show')

    //CREATE PILLS' CODE HERE

    // Select tab by name

    $('.nav-tabs a').on('shown.bs.tab', function(event){
    var x = $(event.target).text();         // active tab
    var y = $(event.relatedTarget).text();  // previous tab
    });

  </script>

</div>

<?php
} else {}
?>

</body>
