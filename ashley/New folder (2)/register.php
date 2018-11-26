<?php
  include_once 'connect.php';

  session_start();
  
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Create New User</title>
  </head>
  <body>
   <!--Nav bar with new user heading-->
   <nav class="navbar  navbar-dark bg-dark">
    <span class="navbar-brand mb-0 h1">Create an Account</span>
      <a class="nav-item nav-link active float-right" href="login.php">Log In</a>
  </nav>



  <!--if username is true than show an alert-->
  <div id="alertDiv" style="margin-top: 10px"></div>

  <!--Username and password form-->
  <div id="formContainer" class="container">
      <div class="row justify-content-center">
          <form style="width: 100%" id="registrationForm" action="createNewUser.php" method="post">
              <div class="form-group row">
                  <label class="col-form-label col-lg-2 col-sm-3 col-md-4" for="inputUsername">Username</label>
                  <input name="username" type="text" class="form-control col-lg-10 col-sm-9 col-md-8" id="inputUsername" aria-describedby="userNAmeHelp" placeholder="Enter Username" required="">
              </div>
              <div class="form-group row">
                  <label class="col-form-label col-lg-2 col-sm-3 col-md-4" for="inputPassword">Password</label>
                  <input name="password" type="password" class="form-control col-lg-10 col-sm-9 col-md-8" id="inputPassword" placeholder="Enter Password" required="">
              </div>
              <div class="form-group row">
                  <label class="col-form-label col-lg-2 col-sm-3 col-md-4" for="inputPassword">Confirm Password</label>
                  <input name="confirm_password" type="password" class="form-control col-lg-10 col-sm-9 col-md-8"id="confirmInputPassword" placeholder="Confirm Password" required="">
              </div>
              <div class="form-group row">
                  <label class="col-form-label col-lg-2 col-sm-3 col-md-4" for="inputEmail">Email</label>
                  <input name="email" type="email" class="form-control col-lg-10 col-sm-9 col-md-8" id="inputEmail" placeholder="Enter Email" required="">
              </div>
              <p> Super Admin (fill in form below):</p>
              <div class="form-group row">
                  <label class="col-form-label col-lg-2 col-sm-3 col-md-4" for="inputUniversityName">University Name</label>
                  <input name="university_name" type="text" class="form-control col-lg-10 col-sm-9 col-md-8" id="inputuniversityName" placeholder="Enter University Name">
              </div>
              <div class="form-group row">
                  <label class="col-form-label col-lg-2 col-sm-3 col-md-4" for="inputUniversityDescription">University Description</label>
                  <input name="university_description" type="text" class="form-control col-lg-10 col-sm-9 col-md-8" id="inputUniversityDescription" placeholder="Enter University Description">
              </div>
              <div class="form-group row">
                  <label class="col-form-label col-lg-2 col-sm-3 col-md-4" for="inputUniversityLocation">University Location</label>
                  <input name="university_location" type="text" class="form-control col-lg-10 col-sm-9 col-md-8" id="inputUniversityLocation" placeholder="Enter University Location">
              </div>
              <div class="form-group row">
                  <label class="col-form-label col-lg-2 col-sm-3 col-md-4" for="inputUniversityNum">Enrollment Count</label>
                  <input name="university_num" type="text" class="form-control col-lg-10 col-sm-9 col-md-8" id="inputUniversityNum" placeholder="Enter Enrollment Count">
              </div>
              <button type="submit" name='submit' class="btn btn-primary btn-sm float-left">Create New User</button>
          </form>
      </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
