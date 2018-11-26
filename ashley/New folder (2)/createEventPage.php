<?php
  include_once 'connect.php';
  include_once 'session.php';
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <title>Create RSO</title>
</head>

<body>
    <!--Nav bar with new user heading-->
    <nav class="navbar  navbar-dark bg-dark">
        <a class="nav-item nav-link float-left" href="index.html">Home</a>
        <a class="nav-item nav-link float-right" href="logout.html">Log Out</a>
    </nav>





    <!--rso  form-->
    <div id="formContainer" class="container">
        <div class="row justify-content-center">
            <form action="createNewEvent.php" method="post">
                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    <label for="eventName">Event Name</label>
                    <input name="event_name" type="text" class="form-control" id="eventName" required="">
                </div>
                <div class="form-group col-sm-6 col-md-6 col-lg-6">
                    <label for="eventCategory">Event Type</label>
                        <select name="event_category" id="eventCategory" class="form-control" required="">
                          <option selected>Choose...</option>
                          <option>public</option>
                          <option>private</option>
                        </select>
                    </label>
                </div>
			          <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    <label for="eventDescription">Event Description</label>
                    <textarea name="event_description" class="form-control" id="eventDescription" rows="3" required=""></textarea>
                </div>
			          <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    <label for="eventTime">Event Time</label>
                    <textarea name="event_time" class="form-control" id="eventTime" rows="1" required=""></textarea>
                </div>
			          <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    <label for="eventDate">Event Date</label>
                    <textarea name="event_date" class="form-control" id="eventDate" rows="1"required=""></textarea>
                </div>
			          <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    <label for="eventLocation">Event Location</label>
                    <textarea name="event_location" class="form-control" id="eventLocation" rows="1" required=""></textarea>
                </div>
			          <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    <label for="contactPhone">Contact Phone</label>
                    <textarea name="contact_phone" class="form-control" id="contactPhone" rows="1" required=""></textarea>
                </div>
                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    <label for="contactEmail">Contact Email</label>
                    <textarea name="contact_email" class="form-control" id="contactEmail" rows="1" required=""></textarea>
                </div>
                <button id="createRSOBtn" type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

</body>

</html>
