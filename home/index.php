<!DOCTYPE html>
<html lang="en">
<?php
session_start();
date_default_timezone_set('America/New_York');
?>
<head>
<!-- Required meta tags - these 3 meta tags *must* come first in the head section -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

<!-- specify brower tab for this page -->
<title>Sign-In</title>
<link rel="icon" href="../images/icon.png">

<!-- include Bootstrap CSS linkage -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- include Traditional CSS from local file -->
<link href="css/styles-acs.css" type="text/css" rel="stylesheet">


<script> <?php require 'status/SH_connect_to_db.php';?> </script>


</head>

<style>
	html body {
		height: 100%;
		background: url("css/bg.jpg");
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>

<body>
<!-- everything visible on page goes in here -->


<div class="container"> <br/>
	<h1>Sign-In</h1>
	<br/>
	<hr>
	<h2><?php echo $_SESSION["name"]; $_SESSION["user_ID"];?></h2>
	<hr>
</div>
<br/>

<!-- 1st and 2nd Half labels  -->
<div id = "dropd" class ="container">
<br/>
<?php
if (date("Hi") <= 1926){
?>
	<div class="container">
				<h3>1st Half</h3>
			<!-- 1st Half Dropdown -->


				<form id=dropdown1form name="firstdrop" action="status/append1strecordtodb.php" method="post">
					<select id="dropdown1" name="dropdown1st" >
						<option value="">Choose</option>
						<option value="B2">B2</option>
	          <option value="G2">G2</option>
	          <option value="B3">B3</option>
	          <option value="G3">G3</option>
						<option value="GH">Guerster</option>
						<option value="BH">Balderston</option>
						<option value="Library">Library</option>
						<option value="LRC">LRC</option>
						<option value="Arts Center">Arts Center</option>
						<option value="Science Building">Science Building</option>
						<option value="BCR">BCR</option>
						<option value="Late Contest">Late Contest</option>
						<option value="Team Practice">Team Practice</option>
						<option value="Student on Duty">Student on Duty</option>
						<option value="Main Hall">Main Hall</option>
						<option value="Class">Class</option>
						<option value="Health Center">Health Center</option>
						<option value="Off-Campus">Off-Campus</option>
						<option value="Teacher @ GH">Teacher @ GH</option>
						<option value="Teacher on B2">Teacher on B2</option>
						<option value="Teacher on B3">Teacher on B3</option>
						<option value="Teacher on G3">Teacher on G3</option>
						<option value="Teacher on G2">Teacher on G2</option>
						<option value="Teacher @ BH">Teacher @ BH</option>
						<option value="Belfry">Srs - Belfry</option>
						<option value="South Lawn">Srs - South Lawn</option>
					</select>
					<br><br>

				</form>


	</div>

<?php
}
else {
?>
<h3>1st Half<br/>You have to be in your signed in location or your room!</h3>
<?php
}
?>


<?php
if (date("Hi") <= 2026) {
?>

<div class="container">

<br/>

			<h3>2nd Half</h3>

		<!-- 2nd Half Dropdown -->

			<form id=dropdown2form name="seconddrop" action="status/append2ndrecordtodb.php" method="post">
				<select id="dropdown2" name="dropdown2nd" >
					<option value="">Choose</option>
					<option value="B2">B2</option>
          <option value="G2">G2</option>
          <option value="B3">B3</option>
          <option value="G3">G3</option>
					<option value="GH">Guerster</option>
					<option value="BH">Balderston</option>
					<option value="Library">Library</option>
					<option value="LRC">LRC</option>
					<option value="Arts Center">Arts Center</option>
					<option value="Science Building">Science Building</option>
					<option value="BCR">BCR</option>
					<option value="Late Contest">Late Contest</option>
					<option value="Team Practice">Team Practice</option>
					<option value="Student on Duty">Student on Duty</option>
					<option value="Main Hall">Main Hall</option>
					<option value="Class">Class</option>
					<option value="Health Center">Health Center</option>
					<option value="Off-Campus">Off-Campus</option>
					<option value="Teacher @ GH">Teacher @ GH</option>
					<option value="Teacher on B2">Teacher on B2</option>
					<option value="Teacher on B3">Teacher on B3</option>
					<option value="Teacher on G3">Teacher on G3</option>
					<option value="Teacher on G2">Teacher on G2</option>
					<option value="Teacher @ BH">Teacher @ BH</option>
					<option value="Belfry">Srs - Belfry</option>
					<option value="South Lawn">Srs - South Lawn</option>
				</select>
				<br><br>

			</form>



</div>
<?php
}
else {
?>
<h3>2nd Half<br/>You have to be in your signed in location or your room!</h3>
<?php
}
?>

<br/>

<?php
		$check = "SELECT*FROM signins WHERE user_id = '".$_SESSION["user_ID"]."' AND signins.date = CURRENT_DATE()";
		$checkResult = mysqli_query($mysqli, $check);
		if ($checkResult->num_rows == 0){
			$signButton = "Sign Me In!";
		} else {
			$signButton = "Change the Location!";
		}
?>

<?php
	if(date("Hi") <= 2026) {
?>
	<div class="container">
	<button type="button" class="btn btn-lg btn-info" onClick="sign()" color="#263238"><?php echo $signButton; ?></button>
	<br/>
	<br/>
	<br/>
	</div>
<?php
} else {

}
?>

</div>
<br/>
<br/>


<?php
if (date("Hi") <= 1926) {
?>
<script type="text/javascript">
function sign(){

	var selection1 = document.getElementById("dropdown1").value;
	var selection2 = document.getElementById("dropdown2").value;
	var user = <?php echo $_SESSION["user_ID"]; ?>;

if (selection1 == "" || selection2 == ""){
	alert("Please select the location.")
}
else{
 var data1 = {
	'l1': selection1,
	'l2': selection2,
	'id': user
};

	jQuery.ajax({
		type:"POST",
		url:"signmein.php",
		dataType:'html',
		data:data1,
		success:function(response)
		{
			if (response == "ok"){
				//window.location.href = 'signin_complete.php';
				alert("Success!");
				//WILL THIS LOGOUT THE USER??
				window.location.href = '../index.php';
				//signOut();
			}
			else{
				alert(response);
			}
		}
	});
}
}
</script>

<?php
} else {
?>
<script type="text/javascript">
function sign(){

	var selection2 = document.getElementById("dropdown2").value;
	var user = <?php echo $_SESSION["user_ID"]; ?>;

if (selection2 == ""){
	alert("Please select location.")
}
else{
 var data1 = {
	'l2': selection2,
	'id': user
};

	jQuery.ajax({
		type:"POST",
		url:"signmein.php",
		dataType:'html',
		data:data1,
		success:function(response)
		{
			if (response == "ok"){
				//window.location.href = 'signin_complete.php';
				//alert("Success!");
				//WILL THIS LOGOUT THE USER??

				<?php session_destroy(); ?>
				window.location.href = '../index.php';
				//signOut();
			}
			else{
				alert(response);
			}
		}
	});
}
}
</script>
<?php } ?>

<!-- main footer code -->
<div class="container">
	<div class="row">
		<div class="container">
			<a href="https://www.westtown.edu/uploaded/files/academics/2017-18_US_Handbook.pdf" style="color: #ffffff;">Study Hall Expectations</a>
		</div><br></br>
		<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"><a href="mailto:brian.kim@westtown.edu" style="color: #ffffff;">contact</a></div>
		<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"> Study Hall Sign-In System </div>
		<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<!-- Note: there are specific legal requirements to reserve rights successfully -->
			&copy; 2018 ACS LLC. All rights reserved. </div>
	</div>
</div>

<!-- Optional JavaScript within body section should go here via link to script files -->

<!-- jQuery first, then Popper.js, then Bootstrap JS - do not change anything following this line -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
