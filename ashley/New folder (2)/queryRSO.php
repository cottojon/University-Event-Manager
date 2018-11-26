<?php
  include_once 'connect.php';
  include_once 'session.php';

  session_start();

  $user = $_SESSION['user'];
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  <!--custom css-->
  <link rel="stylesheet" href="main.css">
  <!--feather icons-->
  <script src="https://unpkg.com/feather-icons"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="main.js"></script>

  <title>University Event Manager</title>
</head>

<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <span class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">University Event Manager</span>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="login.php">Log out</a>
      </li>
    </ul>
  </nav>

  <!--contains everything but top nav-->
  <div class="container-fluid">
    <div class="row">

      <!-- side bar-->
      <nav id="sideBarNav" class="col-md-2  col-lg-2 col-sm-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column" role="navigation">
            <li class="nav-item">
              <a id="home-tab" class="nav-link active" href="home.php" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                <span class="icon" data-feather="home"></span>
                Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <h6 style="margin-top: 4px !important;" class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>My Profile</span>
            </h6>
            <li class="nav-item">
              <a id="myEvents-tab" class="nav-link" href="#myEvents" data-toggle="tab" role="tab" aria-controls="myEvents" aria-selected="false">
                <span class="icon" data-feather="list"></span>
                My Events
              </a>
            </li>
            <li class="nav-item">
              <a id="myRSOs-tab" class="nav-link" href="queryRSO.php" aria-selected="false">
                <span class="icon" data-feather="layers"></span>
                My RSOs
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Events Manager</span>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a id="searchRSOsModalContainer-tab" class="nav-link" href="#searchRSOsModalContainer" data-toggle="modal" data-target="#searchRSOsModalContainer"
                role="tab" aria-selected="false">
                <span class="icon" data-feather="search"></span>
                Search RSO
              </a>
            </li>
            <li class="nav-item">
              <a id="searchEventsModalContainer-tab" class="nav-link" href="#searchEventsModalContainer" data-toggle="modal" data-target="#searchEventsModalContainer"
                role="tab" aria-selected="false">
                <span class="icon" data-feather="search"></span>
                Search Events
              </a>
            </li>
            <li class="nav-item">
              <a id="createRSO-tab" class="nav-link" href="createRSOPage.php" role="tab" aria-selected="false">
                <span class="icon" data-feather="plus"></span>
                Create RSO
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</body>

<div class="tab-content col-md-10 col-sm-10 ml-sm-auto col-lg-10" id="myTabContent">
  <div id="EventContainer" class="container-fluid rounded">
    <div id="eventCardDeck" class="card-deck">

      <?php
      	require('connect.php');

      	$getRSOs = "SELECT *
      					 FROM `rso`";
        $result = mysqli_query($connect, $getRSOs);

        //count the amount of cards for responsive design
        $counter = 0;

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

          echo "<div class=card h-100 mb-4>";
          echo "<div class=card-body>";
          echo "<h6 class=card-title>";
          echo $row['rsoName'];
          echo "</h6>";
          echo "<p class=card-text>";
          echo $row['rsoDescription'];
          echo "</p>";
          echo "<a href=rsoPage.php class=card-link>";
          echo "More Info";
          echo "</a>";
          echo "</div>";
          echo "</div>";

          $counter++; //increment counter

          //for the responisve design
          if (($counter % 2) == 0) {
            //every two cards sm
            echo '<div class="w-100 d-none d-sm-block d-md-none"></div>';
          }

          if (($counter % 3) == 0) {
            //every three cards md
            echo '<div class="w-100 d-none d-md-block d-lg-none"></div>';

          }


          if (($counter % 4) == 0) {
            //every four cards lg
            echo '<div class="w-100 d-none d-lg-block d-xl-none"></div>';
          }


          if (($counter % 5) == 0) {
            //every five cards XL
            echo '<div class="w-100 d-none d-xl-block"></div>';
          }
        }
      ?>
    </div>
  </div>
</div>
