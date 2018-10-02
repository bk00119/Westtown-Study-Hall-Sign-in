<?php
session_start();
?>
<link href="nav.css" type="text/css" rel="stylesheet">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../../../index.php">Study Hall Sign-in</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php?location=DA">DA</a></li>
      <li class="dropdown" id="location">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Dorms
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?location=BH">Balderston</a></li>
          <li><a href="index.php?location=GH">Guester House</a></li>
          <li><a href="index.php?location=B2">B2</a></li>
          <li><a href="index.php?location=B3">B3</a></li>
          <li><a href="index.php?location=G2">G2</a></li>
          <li><a href="index.php?location=G3">G3</a></li>
        </ul>
      </li>
      <li class="dropdown" id="location">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Locations
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?location=library">Library</a></li>
          <li><a href="index.php?location=Arts%20Center">Arts Center</a></li>
          <li><a href="index.php?location=LRC">LRC</a></li>
          <li><a href="index.php?location=Main%20Hall">Main Hall</a></li>
          <li><a href="index.php?location=Belfry">Belfry</a></li>
          <li><a href="index.php?location=Science%20Center">Science Center</a></li>
          <li><a href="index.php?location=South%20Lawn">South Lawn</a></li>
          <li><a href="index.php?location=Health%20Center">Health Center</a></li>
        </ul>
      </li>
      <!-- Note function... -->
      <li class="memo"><a href="note.php">Note</a></li>
      <li class="contact" id="email">
        <a href="mailto:brian.kim@westtown.edu">Having a problem?</a>
      </li>
    </ul>
  </div>
</nav>
<?php
$_SESSION["location"] = $_GET["location"];
?>
