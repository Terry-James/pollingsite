<?php
// Terry James CS396 Project2

// sets sessions so this page can not be viewed without a valid email
session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.html"); // return to login if email is not set
}
?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Poll</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body class="thisBody"> <!--the class adds the background image -->
    <!--Creates the nav bar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- used for resizing the navbar on smaller screens-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logOut.php">Log Out</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stats.php">View Stats</a>
                </li>
            </ul>
            <!-- form for searching for a poll-->
            <form class="form-inline my-2 my-lg-0" action="searchPoll.php" method="POST">
                <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search for a poll"
                    aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <div class="row">
                    <h2> Create a Poll</h2>
                </div>
                <div class="row" >
                    <!-- form for creating the poll-->
                    <form action="addData.php" method="POST">
                        <input type="text" class="my-2" name="pollQ" id="poll" placeholder="Enter a poll question"
                            required>
                        <input type="text" class="my-2" name="choice1" id="choice1" placeholder="Enter choices">
                        <input type="text" class="my-2" name="choice2" id="choice2" placeholder="Enter choices">
                        <input type="text" class="my-2" name="choice3" id="choice3" placeholder="Enter choices">
                        <input type="text" class="my-2" name="choice4" id="choice4" placeholder="Enter choices">
                        <input type="text" class="my-2" name="choice5" id="choice5" placeholder="Enter choices">
                        <input type="text" class="my-2" name="choice6" id="choice6" placeholder="Enter choices">
                        <button type="submit" id="pollButton"> Submit Poll</button>
                    </form>
                    <!-- form for selecting the number of choices for the question-->
                    <form>
                        <input type="text" id="numOf" placeholder="Enter number of answers" required>
                        <button type="button" id="abutton" onclick="removeText()"> Submit </button>
                    </form>
                </div>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
</body>
<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!--script hides the answer boxes until the number of choices are entered -->
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        hideSomething();
    });
</script>

</html>

