<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.html");
}

$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'pollvoting';
$searchResult = $_POST['pollNumber'];
$numOf = 0;


$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

if(isset($searchResult)){
    $ansPoll = ("SELECT * FROM polls WHERE pollNum = $searchResult");
    $queryResult = mysqli_query($db, $ansPoll);
    $row = mysqli_fetch_assoc($queryResult);
    $numOf = $row['numofChoices'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Poll</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body class="thisBody">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">View Stats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="createPoll.php">Create a Poll</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="searchPoll.php" method="POST">
                <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search for a poll" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <form method="POST" action="submitPoll.php">
            <p> <h2><?php print_r($row['pollQuestion'])?></h2></p>
            <input type="radio" name="ans1" <h2><?php print_r($row['pollAnswer1'])?></h2><br>
            <input type="radio" name="ans2" <h2><?php print_r($row['pollAnswer2'])?></h2><br>
            <input type="radio" name="ans3" <h2><?php print_r($row['pollAnswer3'])?></h2><br>
            <input type="radio" name="ans4" <h2><?php print_r($row['pollAnswer4'])?></h2><br>
            <input type="radio" name="ans5" <h2><?php print_r($row['pollAnswer5'])?></h2><br>
            <input type="radio" name="ans6" <h2><?php print_r($row['pollAnswer6'])?></h2><br>
            <button type="submit">Submit</button>
            </form>
        </div>
        <div class="col-sm">
        </div>
    </div>
</div>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        hideAnswers(<?php $numOf?>);
    });
</script>
</html>