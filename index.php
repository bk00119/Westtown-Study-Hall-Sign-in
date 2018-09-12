<html lang="en">
  <head>

    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="640889853917-rflk4hfsuc9pb1g428vluq839n7odtu4.apps.googleusercontent.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>Sign-In</title>
    <link rel="icon" href="home/images/clipboard.png" width="50px">

    <?php require 'googleapi.php'; ?>
    <!--
    <script src="script.js"></script>
    -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Log in Page CSS -->
    <link rel="index.css" type="text/css" rel="stylesheet">

  </head>
  <h2 class="title">Study Hall Sign-in</h2>

  <style>

    .g-signin2{
      width: 100%;
      display: inline-block;
      position: relative;
    }
    .center {
      margin: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  </style>
  <body class="center">
    <div id = "my-signin2"></div>
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
  </body>
</html>
