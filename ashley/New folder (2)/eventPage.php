<?php
require('connect.php');

if($_POST['Submit'] ) {
	$comment = $_POST['userCommentText'];
	$sql="INSERT INTO commentsAndRating(commentText) VALUES ('$comment')";
	mysqli_query($connect, $sql);
	echo $comment;

}

?>


<!doctype html>
<html lang="en">

<head>
<style>
<style>
    .box{
        border: 1px solid #aaa; /*getting border*/
        border-radius: 4px; /*rounded border*/
        color: #000; /*text color*/
		margin-left: 230px;
		margin-right: 170px;
		color: #b8c9db;
    }
</style>
</style>
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
    <title>Event Page</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a id="Follow Event" class="nav-link" href="">Follow Event</a>
                    </li>
                </ul>
                <div class="mt-2 mt-md-0">
                    <a class="nav-item nav-link float-right" href="{{ url_for('login') }}">Log Out</a>
                </div>
            </div>
        </nav>
    </header>



    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 id="eventTitle" class="display-3">EVENT NAME HERE</h1>
                <p id="rsoName" class="lead">RSO Name Goes Here</p>

                <p id="eventDescription">EVENT DESCRIPTION HERE. This is a template for a simple marketing or
                    informational website. It
                    includes a
                    large callout
                    called a jumbotron and three supporting pieces of content. Use it as a starting point to create
                    something
                    more
                    unique.
                </p>

                <h6 id="eventType">Event Type <span class="badge badge-dark">Social</span></h4>
                    <h6 id="eventUniversity">Event University <span class="badge badge-dark">University of Central
                            Florida</span></h4>
                        <h6 id="eventDate">Event Date <span class="badge badge-dark">11/30/18</span></h4>
                            <h6 id="eventStartTime">Start Time <span class="badge badge-dark">0700</span></h4>
                                <h6 id="eventLength">Event Length <span class="badge badge-dark">60 mins</span></h4>
                                    <h6 id="eventAddress">Event Address <span class="badge badge-dark">Address</span></h4>
                                        <h6 id="eventEmail">Contact Email <span class="badge badge-dark">email@email.com</span></h4>

            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <!--comment form-->
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <form action = "eventPage.php" method = "POST">
                        <div class="form-group row">
                            <label class="col-sm-6 col-md-4 col-lg-2" for="userCommentTextBox" class="col-sm-2 col-form-label">Comment</label>
                            <div class="col-sm-6 col-md-8 col-lg-10">
                                <textarea class="form-control" name ="userCommentText" id="userCommentTextBox" rows="3"></textarea>
                            </div>
							 <!--<input type="text" value="gdf" name="comment" id="comment" /><br /><br />-->
                        </div>
                        <button id="submitCmtBtn" type="submit" value ="Submit Comment" name="Submit" class="btn btn-primary float-right">Submit Comment</button>
                    </form>

                </div>

            </div>


        </div>
        <!-- /container -->

        <div class="container">
            <h2 class="text-center">Comments</h2>
	<?php
	require('connect.php');
	//echo "starting";
	//get the data
	//function printStuff(){
	$result =mysql_query("SELECT * FROM commentsAndRating");
	//results=mysql_query($connect,$query);
	//echo $query;
	//mysqli_query($connect, $query)
	while($row=mysql_fetch_array($result)) {
		
		$id=$row['commentID'];
		$comment=$row['commentText'];
		echo $comment;
		//echo $id	.	"<br />"	.	$comment.	"<br />"	.	 "<br />";
		
		
	} 
		?>
        </div>
<!--	<table>
	<tr><td>Id: </td><td><input type="int" name="id"  /></td></tr>
	<tr><td colspan="2">Comment: </td></tr> 
	<tr><td colspan="2"><textarea name="comment"></texarea></td></tr> -->


    </main>
	


</body>

</html>

