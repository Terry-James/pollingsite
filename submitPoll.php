<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.html");
}

$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'pollvoting';
$pollNum = $_SESSION['numChoices'];
$answer1 = $_POST['ans1'];
$answer2 = $_POST['ans2'];
$answer3 = $_POST['ans3'];
$answer4 = $_POST['ans4'];
$answer5 = $_POST['ans5'];
$answer6 = $_POST['ans6'];



$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

$checking = ("SELECT pollNum FROM pollsanswered WHERE pollNum = $pollNum");
$checkRes = mysqli_query($db, $checking);
$checkRows = mysqli_num_rows($checkRes);

if($checkRows == 0){ // poll hasn't been answered before
    // start adding new data
    $insertPoll = ("INSERT INTO pollsanswered(pollNum) VALUE($pollNum)");
    $insertQuery = mysqli_query($db, $insertPoll);

    if(isset($answer1) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
        echo $row['ans1chs'];

        // TODO change insert to UPDATE 
        $updateValue = ("INSERT INTO pollsanswered (ans1chs) VALUES(($row['ans1chs'] + 1))");
        $sqlQuery1 = mysqli_query($db, $searching);
    }
    elseif(isset($answer2) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
    
        $searching = ("INSERT INTO pollsanswered (ans2chs) VALUES(($row['ans2chs'] + 1))");
        $sqlQuery1 = mysqli_query($db, $searching);
    }
    elseif(isset($answer3) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
    
        $searching = ("INSERT INTO pollsanswered (ans3chs) VALUES(($row['ans3chs'] + 1))");
        $sqlQuery1 = mysqli_query($db, $searching);
    }
    elseif(isset($answer4) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
    
        $searching = ("INSERT INTO pollsanswered (ans4chs) VALUES(($row['ans4chs'] + 1))");
        $sqlQuery1 = mysqli_query($db, $searching);
    }
    elseif(isset($answer5) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
    
        $searching = ("INSERT INTO pollsanswered (ans5chs) VALUES(($row['ans5chs'] + 1))");
        $sqlQuery1 = mysqli_query($db, $searching);
    }
    elseif(isset($answer6) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
    
        $searching = ("INSERT INTO pollsanswered (ans6chs) VALUES(($row['ans6chs'] + 1))");
        $sqlQuery1 = mysqli_query($db, $searching);
    }
}
else{ // poll has been answered before
    // pull poll stats and add one for the selected choice
    if(isset($answer1) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
    
        $updateValue = ("INSERT INTO pollsanswered (ans1chs) VALUES(($row['ans1chs'] + 1))");
        $sqlQuery1 = mysqli_query($db, $searching);
    }
    elseif(isset($answer2) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
    
        $searching = ("INSERT INTO pollsanswered (ans2chs) VALUES(($row['ans2chs'] + 1))");
        $sqlQuery1 = mysqli_query($db, $searching);
    }
    elseif(isset($answer3) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
    
        $searching = ("INSERT INTO pollsanswered (ans3chs) VALUES(($row['ans3chs'] + 1))");
        $sqlQuery1 = mysqli_query($db, $searching);
    }
    elseif(isset($answer4) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
    
        $searching = ("INSERT INTO pollsanswered (ans4chs) VALUES(($row['ans4chs'] + 1))");
        $sqlQuery1 = mysqli_query($db, $searching);
    }
    elseif(isset($answer5) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
    
        $searching = ("INSERT INTO pollsanswered (ans5chs) VALUES(($row['ans5chs'] + 1))");
        $sqlQuery1 = mysqli_query($db, $searching);
    }
    elseif(isset($answer6) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
    
        $searching = ("INSERT INTO pollsanswered (ans6chs) VALUES(($row['ans6chs'] + 1))");
        $sqlQuery1 = mysqli_query($db, $searching);
    }
}



?>