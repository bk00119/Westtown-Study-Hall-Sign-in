<!DOCTYPE HTML>
<!--
	Dimension by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Westtown Sign-in</title>
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
							<span class="icon fa-diamond"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1>Study Hall<br>Sign-in</h1>
								<p>A fully responsive site template designed by <a href="https://html5up.net">HTML5 UP</a> and released<br />
				for free under the <a href="https://html5up.net/license">Creative Commons</a> license.</p>
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

				<!-- Main -->
					<div id="main">

						<!-- Intro -->
							<article id="intro">
								<h2 class="major">Intro</h2>
								<span class="image main"><img src="images/pic01.jpg" alt="" /></span>
								<p>Aenean ornare velit lacus, ac varius enim ullamcorper eu. Proin aliquam facilisis ante interdum congue. Integer mollis, nisl amet convallis, porttitor magna ullamcorper, amet egestas mauris. Ut magna finibus nisi nec lacinia. Nam maximus erat id euismod egestas. By the way, check out my <a href="#work">awesome work</a>.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus rutrum facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam tristique libero eu nibh porttitor fermentum. Nullam venenatis erat id vehicula viverra. Nunc ultrices eros ut ultricies condimentum. Mauris risus lacus, blandit sit amet venenatis non, bibendum vitae dolor. Nunc lorem mauris, fringilla in aliquam at, euismod in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In non lorem sit amet elit placerat maximus. Pellentesque aliquam maximus risus, vel sed vehicula.</p>
							</article>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; BK, AZ, SD, and CC</a>.</p>
					</footer>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			<script>
				function onSuccess(googleUser){
					var profile = googleUser.getBasicProfile();
					//console.log("ID: " + profile.getId()); // Don't send this directly to your server!
					//console.log('Full Name: ' + profile.getName());
					//console.log('Given Name: ' + profile.getGivenName());
					//console.log('Family Name: ' + profile.getFamilyName());
					//console.log("Image URL: " + profile.getImageUrl());
					console.log("Email: " + profile.getEmail());
					var id_token = googleUser.getAuthResponse().id_token;
					//console.log("ID Token: " + id_token);

					var approved_user = profile.getEmail();
					if (approved_user.match("westtown.edu$")) {
						if (window.confirm("Do you want to sign in?")) {

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
						}
						else {
							signOut();
						}
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
</html>
