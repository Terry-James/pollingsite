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
    <title>Answer Poll</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body class="thisBody">
    <!--just another navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
            </ul>
            <!--another search bar for looking up polls-->
            <form class="form-inline my-2 my-lg-0" action="searchPoll.php" method="POST">
                <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search for a poll" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</nav>

<?php
// variables
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'pollvoting';
$searchResult = $_POST['pollNumber'];
$_SESSION['numChoices'] = $searchResult;

// connect to the database
$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

// query to get the number of choices for the poll selected
$getNum = ("SELECT numofChoices FROM polls WHERE pollNum = $searchResult ");
$queryRes = mysqli_query($db, $getNum);
$row = mysqli_fetch_assoc($queryRes);

// if elses to display the correct amount of choices with the poll question
if($row['numofChoices'] == 1){
    $search1 = ("SELECT pollQuestion, pollAnswer1 FROM polls WHERE pollNum = $searchResult");
    $query1 = mysqli_query($db, $search1);
    $row1 = mysqli_fetch_assoc($query1);
    echo "<div style = 'top: 200pt; margin:0 auto; width: 825px; background-color: lightgreen'>\n";
    echo "<form id='submit' method='Post' action='submitPoll.php'>\n";
    echo "<table border = '1' style='border-color: white'>";
    echo "<tr><th style ='padding: 25px; text-align: left'> Poll Question </th> 
        <th style ='padding: 15px; text-align: center'> Choice1 </th>
        <th style ='padding: 15px; text-align: center'> Submit Poll </th></tr>\n";

    echo '<tr><td style ="padding: 15px; text-align: left">'.$row1['pollQuestion'].'</td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row1['pollAnswer1'].'<br><input type="checkbox" name="ans1"></td></tr>';
    echo "</table>\n";
    echo "</form>";
    echo "</div>";
}
else if($row['numofChoices'] == 2){
    $search2 = ("SELECT pollQuestion, pollAnswer1, pollAnswer2 FROM polls WHERE pollNum = $searchResult");
    $query2 = mysqli_query($db, $search2);
    $row2 = mysqli_fetch_assoc($query2);
    echo "<div style = 'top: 200pt; margin:0 auto; width: 450px; background-color: lightgreen'>\n";
    echo "<form id='submit' method='Post' action='submitPoll.php'>\n";
    echo "<table border = '1' style='border-color: white'>";
    echo "<tr><th style ='padding: 25px; text-align: left'> Poll Question </th> 
        <th style ='padding: 15px; text-align: center'> Choice1 </th>
        <th style ='padding: 15px; text-align: center'> Choice2 </th>
        <th style ='padding: 15px; text-align: center'> Submit Poll </th></tr>\n";

    echo '<tr><td style ="padding: 15px; text-align: left">'.$row2['pollQuestion'].'</td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row2['pollAnswer1'].'<br><input type="checkbox" name="ans1"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row2['pollAnswer2'].'<br><input type="checkbox" name="ans2"></td>';
    echo '<td style ="padding: 15px; text-align: center"><button type="submit">Submit</button></tr>';
    echo "</table>\n";
    echo "</form>";
    echo "</div>";
}
else if($row['numofChoices'] == 3){
    $search3 = ("SELECT pollQuestion, pollAnswer1, pollAnswer2, pollAnswer3 FROM polls WHERE pollNum = $searchResult");
    $query3 = mysqli_query($db, $search3);
    $row3 = mysqli_fetch_assoc($query3);
    echo "<div style = 'top: 200pt; margin:0 auto; width: 600px; background-color: lightgreen'>\n";
    echo "<form id='submit' method='Post' action='submitPoll.php'>\n";
    echo "<table border = '1' style='border-color: white'>";
    echo "<tr><th style ='padding: 25px; text-align: left'> Poll Question </th> 
        <th style ='padding: 15px; text-align: center'> Choice1 </th>
        <th style ='padding: 15px; text-align: center'> Choice2 </th>
        <th style ='padding: 15px; text-align: center'> Choice3 </th>
        <th style ='padding: 15px; text-align: center'> Submit Poll </th></tr>\n";

    echo '<tr><td style ="padding: 15px; text-align: left">'.$row3['pollQuestion'].'</td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row3['pollAnswer1'].'<br><input type="checkbox" name="ans1"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row3['pollAnswer2'].'<br><input type="checkbox" name="ans2"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row3['pollAnswer3'].'<br><input type="checkbox" name="ans3"></td>';
    echo '<td style ="padding: 15px; text-align: center"><button type="submit">Submit</button></tr>';
    echo "</table>\n";
    echo "</form>";
    echo "</div>";
}
else if($row['numofChoices'] == 4){
    $search4 = ("SELECT pollQuestion, pollAnswer1, pollAnswer2, pollAnswer3, pollAnswer4 FROM polls WHERE pollNum = $searchResult");
    $query4 = mysqli_query($db, $search4);
    $row4 = mysqli_fetch_assoc($query4);
    echo "<div style = 'top: 200pt; margin:0 auto; width: 825px; background-color: lightgreen'>\n";
    echo "<form id='submit' method='Post' action='submitPoll.php'>\n";
    echo "<table border = '1' style='border-color: white'>";
    echo "<tr><th style ='padding: 25px; text-align: left'> Poll Question </th> 
        <th style ='padding: 15px; text-align: center'> Choice1 </th>
        <th style ='padding: 15px; text-align: center'> Choice2 </th>
        <th style ='padding: 15px; text-align: center'> Choice3 </th>
        <th style ='padding: 15px; text-align: center'> Choice4 </th>
        <th style ='padding: 15px; text-align: center'> Submit Poll </th></tr>\n";

    echo '<tr><td style ="padding: 15px; text-align: left">'.$row4['pollQuestion'].'</td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row4['pollAnswer1'].'<br><input type="checkbox" name="ans1"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row4['pollAnswer2'].'<br><input type="checkbox" name="ans2"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row4['pollAnswer3'].'<br><input type="checkbox" name="ans3"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row4['pollAnswer4'].'<br><input type="checkbox" name="ans4"></td>';
    echo '<td style ="padding: 15px; text-align: center"><button type="submit">Submit</button</tr>';
    echo "</table>\n";
    echo "</form>";
    echo "</div>";
}
else if($row['numofChoices'] == 5){
    $search5 = ("SELECT pollQuestion, pollAnswer1, pollAnswer2, pollAnswer3, pollAnswer4, pollAnswer5 FROM polls WHERE pollNum = $searchResult");
    $query5 = mysqli_query($db, $search5);
    $row5 = mysqli_fetch_assoc($query5);
    echo "<div style = 'top: 200pt; margin:0 auto; width: 750px; background-color: lightgreen'>\n";
    echo "<form id='submit' method='Post' action='submitPoll.php'>\n";
    echo "<table border = '1' style='border-color: white'>";
    echo "<tr><th style ='padding: 25px; text-align: left'> Poll Question </th> 
        <th style ='padding: 15px; text-align: center'> Choice1 </th>
        <th style ='padding: 15px; text-align: center'> Choice2 </th>
        <th style ='padding: 15px; text-align: center'> Choice3 </th>
        <th style ='padding: 15px; text-align: center'> Choice4 </th>
        <th style ='padding: 15px; text-align: center'> Choice5 </th>
        <th style ='padding: 15px; text-align: center'> Submit Poll </th></tr>\n";

    echo '<tr><td style ="padding: 15px; text-align: left">'.$row5['pollQuestion'].'</td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row5['pollAnswer1'].'<br><input type="checkbox" name="ans1"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row5['pollAnswer2'].'<br><input type="checkbox" name="ans2"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row5['pollAnswer3'].'<br><input type="checkbox" name="ans3"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row5['pollAnswer4'].'<br><input type="checkbox" name="ans4"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row5['pollAnswer5'].'<br><input type="checkbox" name="ans5"></td>';
    echo '<td style ="padding: 15px; text-align: center"><button type="submit">Submit</button</tr>';
    echo "</table>\n";
    echo "</form>";
    echo "</div>";
}
else if($row['numofChoices'] == 6){
    $search6 = ("SELECT pollQuestion, pollAnswer1, pollAnswer2, pollAnswer3, pollAnswer4, pollAnswer5, pollAnswer6 FROM polls WHERE pollNum = $searchResult");
    $query6 = mysqli_query($db, $search6);
    $row6 = mysqli_fetch_assoc($query6);
    echo "<div style = 'top: 200pt; margin:0 auto; width: 825px; background-color: lightgreen'>\n";
    echo "<form id='submit' method='Post' action= 'submitPoll.php'>\n";
    echo "<table border = '1' style='border-color: white'>";
    echo "<tr><th style ='padding: 25px; text-align: left'> Poll Question </th> 
        <th style ='padding: 15px; text-align: center'> Choice1 </th>
        <th style ='padding: 15px; text-align: center'> Choice2 </th>
        <th style ='padding: 15px; text-align: center'> Choice3 </th>
        <th style ='padding: 15px; text-align: center'> Choice4 </th>
        <th style ='padding: 15px; text-align: center'> Choice5 </th>
        <th style ='padding: 15px; text-align: center'> Choice6 </th>
        <th style ='padding: 15px; text-align: center'> Submit Poll </th></tr>\n";

    echo '<tr><td style ="padding: 15px; text-align: left">'.$row6['pollQuestion'].'</td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row6['pollAnswer1'].'<br><input type="checkbox" name="ans1"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row6['pollAnswer2'].'<br><input type="checkbox" name="ans2"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row6['pollAnswer3'].'<br><input type="checkbox" name="ans3"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row6['pollAnswer4'].'<br><input type="checkbox" name="ans4"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row6['pollAnswer5'].'<br><input type="checkbox" name="ans5"></td>';
    echo '<td style ="padding: 15px; text-align: center">'.$row6['pollAnswer6'].'<br><input type="checkbox" name="ans6"></td>';
    echo '<td style ="padding: 15px; text-align: center"><button type="submit">Submit</button></tr>';
    echo "</table>\n";
    echo "</form>";
    echo "</div>";
}
?>
</body>
<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</html>



