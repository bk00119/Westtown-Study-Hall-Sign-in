<!DOCTYPE HTML>
<!--
	Dimension by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Westtown Sign-in</title>
		<link rel="icon" href="images/clipboard.png" width="50px">

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<meta name="google-signin-scope" content="profile email">
		<meta name="google-signin-client_id" content="640889853917-rflk4hfsuc9pb1g428vluq839n7odtu4.apps.googleusercontent.com">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<?php //require 'googleapi.php'; ?>

		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>

	<style>
	.abcRioButtonBlue {
    background-color: #ffffff;
    border: none;
    color: #444;
	}
	</style>

	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span class="icon fa fa-wikipedia-w" style="padding-top:2rem;"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1>Study Hall<br>Sign-in</h1>
								<p>Westonian's Study Hall Sign-in System.<br></br>Built by Brian Kim'19, Alina Zhao'19, Samantha Dow'19, and Cate Cappuccio'19.</p>
							</div>
						</div>
						<nav>
							<ul class="center">
								<li>
									<div id = "my-signin2"></div>
								</li>

								<!--<li><a href="#elements">Elements</a></li>-->
							</ul>
						</nav>
					</header>

				<!-- Footer -->
					<footer id="footer">

						<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"><a href="mailto:briankim00119@gmail.com" style="color: #ffffff;">contact</a></div>

						<p class="copyright">&copy; BK, AZ, SD, and CC</a>.</p>
					</footer>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			<script>
				function onSuccess(googleUser){
					signOut();

					var profile = googleUser.getBasicProfile();
					//console.log("ID: " + profile.getId()); // Don't send this directly to your server!
					//console.log('Full Name: ' + profile.getName());
					//console.log('Given Name: ' + profile.getGivenName());
					//console.log('Family Name: ' + profile.getFamilyName());
					//console.log("Image URL: " + profile.getImageUrl());
					//console.log("Email: " + profile.getEmail());
					var id_token = googleUser.getAuthResponse().id_token;
					//console.log("ID Token: " + id_token);

					var approved_user = profile.getEmail();
					if (approved_user.match("westtown.edu$")) {
						//if (window.confirm("Do you want to sign in?")) {

							//USE THIS FOR THE AFTER FINISHING UP THE SIGNINN PAGE!
							//window.location.href = "signinn.php";

							//AJAX


							////SENDING THE PERSONAL DATA TO AJAX FILE (using $.post)
							$.post("handler.php",
							{
								name: profile.getName(),
								f_name: profile.getGivenName(),
								l_name: profile.getFamilyName(),
								email: profile.getEmail(),
								id_token: googleUser.getAuthResponse().id_token
							},
							function(data,status){
								//alert.("Data: " + data + "\nStatus: " + status);
							}
							);

							//USE THIS FOR TESTING!
							window.location.href = "select.php";
						//}
						//else {
							//signOut();
						//}
					}
					else {
						window.alert("You're not an apporved user.");
						//window.location = "index.php/?logout&hl=en";
							signOut();
						}
					}
					function onFailure(error) {
						console.log(error);
					}
					function renderButton() {
						gapi.signin2.render('my-signin2', {
						'scope': 'profile email',
						'width': 400,
						'height': 100,
						'longtitle': true,
						'theme': 'dark',
						'onsuccess': onSuccess,
						'onfailure': onFailure
						});
					}
			</script>
			<!-- THIS IS NEEDED FOR LOGOUT BUTTON!
			<a href="#" onclick="signOut();">Sign out</a>
			-->
			<script>

				function signOut() {
					var auth2 = gapi.auth2.getAuthInstance();
					auth2.signOut().then(function () {
						console.log('User logged out.');
					});
				}
			</script>
			<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>


			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
	<?php session_destroy(); ?>
</html>
