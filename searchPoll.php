<?php
// Terry James CS396 Project2

// sets sessions so this page can not be viewed without a valid email
session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.html"); // return to login if email is not set
}
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body class="thisBody">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logOut.php">Log Out</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stats.php">View Stats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="createPoll.php">Create a Poll</a>
                </li>
                <!--form for selecting a poll to vote on -->
                <form class="form-inline my-2 my-lg-0" method="POST" action="select.php">
                <input class="form-control mr-sm-2" type="text" name="pollNumber" id="pollNumber" placeholder="Enter poll number " required>
                 <button class="btn btn-primary my-2 my-sm-0" type="submit" id="abutton">Submit</button>
                </form>
            </ul>
            <!--search bar for searching polls that have been created-->
            <form class="form-inline my-2 my-lg-0" action="searchPoll.php" method="POST">
                <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search for a poll" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-sm">
        <div class="row">    
        <?php
        // variables 
        $db_host = 'localhost';
        $db_username = 'root';
        $db_pass = '';
        $db_name = 'pollvoting';
        $searchResult = $_POST['search'];

        // connect to a database
        $db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

        // check if something was entered into search bar
        if (isset($searchResult)){
            // Database query
            $searching = ("SELECT pollQuestion,numofChoices, pollAnswer1, pollAnswer2, pollAnswer3, pollAnswer4, pollAnswer5, pollAnswer6, pollNum FROM polls WHERE pollQuestion LIKE '%$searchResult%'");
            $myQuery = mysqli_query($db,$searching);
            if (mysqli_num_rows($myQuery) > 0){ // make sure search result isn't empty
                echo "<div style = 'top: 200pt; margin:0 auto; background-color: lightgreen'>\n";
                echo "<table border = '1' style='border-color: white'>";
                echo "<tr><th style ='padding: 25px; text-align: left'> Poll Question </th> 
                    <th style ='padding: 15px; text-align: center'> Choice1 </th>
                    <th style ='padding: 15px; text-align: center'> Choice2 </th>  
                    <th style ='padding: 15px; text-align: center'> Choice3 </th>  
                    <th style ='padding: 15px; text-align: center'> Choice4 </th>
                    <th style ='padding: 15px; text-align: center'> Choice5 </th>  
                    <th style ='padding: 15px; text-align: center'> Choice6 </th>    
                    <th style ='padding: 15px; text-align: center'> Poll Number </th></tr>\n";
                while($rows = mysqli_fetch_assoc($myQuery)){ // as long as a row exist print results from database search
                    echo '<tr><td style ="padding: 15px; text-align: left">'.$rows['pollQuestion'].'</td>';
                            echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer1'].'</td>';
                            echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer2'].'</td>';
                            echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer3'].'</td>';
                            echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer4'].'</td>';
                            echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer5'].'</td>';
                            echo '<td style ="padding: 15px; text-align: center">'.$rows['pollAnswer6'].'</td>';
                            echo '<td style ="padding: 15px; text-align: center">'.$rows['pollNum'].'</td></tr>';
                }
                echo "</table>\n";
                echo "</div>";
            }
        }
            ?>
        </div>
        </div>
        <div class="col-sm"></div>
    </div>
</div>
</body>
</html>

