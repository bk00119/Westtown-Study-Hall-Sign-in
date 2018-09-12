<html lang="en">
<?php
echo $_POST["name"];

session_start();
$_SESSION["name"] = $_POST["name"];
$_SESSION["email"] = $_POST["email"];
$_SESSION["id_token"] = $_POST["id_token"];

echo $_SESSION["name"];
echo $_SESSION["email"];
//echo $_SESSION["id_token"];

?>
</html>
