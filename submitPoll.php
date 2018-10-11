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
    

    if(isset($answer1) == true){
        $insertPoll = ("INSERT INTO pollsanswered(pollNum) VALUE($pollNum)");
        $insertQuery = mysqli_query($db, $insertPoll);

        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
        $ans1 = $row['ans1chs'];

        $updateValue = ("UPDATE pollsanswered SET ans1chs = $ans1+1 WHERE pollNum = $pollNum ");
        $sqlQuery1 = mysqli_query($db, $updateValue);
        header('Location: createPoll.php');
    }
    elseif(isset($answer2) == true){
        $insertPoll = ("INSERT INTO pollsanswered(pollNum) VALUE($pollNum)");
        $insertQuery = mysqli_query($db, $insertPoll);

        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
        $ans2 = $row['ans2chs'];

        $updateValue = ("UPDATE pollsanswered SET ans2chs = $ans2 + 1 WHERE pollNum = $pollNum ");
        $sqlQuery1 = mysqli_query($db, $updateValue);
        header('Location: createPoll.php');
    }
    elseif(isset($answer3) == true){
        $insertPoll = ("INSERT INTO pollsanswered(pollNum) VALUE($pollNum)");
        $insertQuery = mysqli_query($db, $insertPoll);

        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
        $ans3 = $row['ans3chs'];

        $updateValue = ("UPDATE pollsanswered SET ans3chs = $ans3 + 1 WHERE pollNum = $pollNum ");
        $sqlQuery1 = mysqli_query($db, $updateValue);
        header('Location: createPoll.php');
    }
    elseif(isset($answer4) == true){
        $insertPoll = ("INSERT INTO pollsanswered(pollNum) VALUE($pollNum)");
        $insertQuery = mysqli_query($db, $insertPoll);

        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
        $ans4 = $row['ans4chs'];

        $updateValue = ("UPDATE pollsanswered SET ans4chs = $ans4 + 1 WHERE pollNum = $pollNum ");
        $sqlQuery1 = mysqli_query($db, $updateValue);
        header('Location: createPoll.php');
    }
    elseif(isset($answer5) == true){
        $insertPoll = ("INSERT INTO pollsanswered(pollNum) VALUE($pollNum)");
        $insertQuery = mysqli_query($db, $insertPoll);

        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
        $ans5 = $row['ans5chs'];

        $updateValue = ("UPDATE pollsanswered SET ans5chs = $ans5 + 1 WHERE pollNum = $pollNum ");
        $sqlQuery1 = mysqli_query($db, $updateValue);
        header('Location: createPoll.php');
    }
    elseif(isset($answer6) == true){
        $insertPoll = ("INSERT INTO pollsanswered(pollNum) VALUE($pollNum)");
        $insertQuery = mysqli_query($db, $insertPoll);

        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
        $ans6 = $row['ans6chs'];

        $updateValue = ("UPDATE pollsanswered SET ans6chs = $ans6 + 1 WHERE pollNum = $pollNum ");
        $sqlQuery1 = mysqli_query($db, $updateValue);
        header('Location: createPoll.php');
    }
}
else{ // poll has been answered before
    // pull poll stats and add one for the selected choice
    if(isset($answer1) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
        $ans1 = $row['ans1chs'];

        $updateValue = ("UPDATE pollsanswered SET ans1chs = $ans1 + 1 WHERE pollNum = $pollNum ");
        $sqlQuery1 = mysqli_query($db, $updateValue);
        header('Location: createPoll.php');
    }
    elseif(isset($answer2) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
        $ans2 = $row['ans2chs'];

        $updateValue = ("UPDATE pollsanswered SET ans2chs = $ans2 + 1 WHERE pollNum = $pollNum ");
        $sqlQuery1 = mysqli_query($db, $updateValue);
        header('Location: createPoll.php');
    }
    elseif(isset($answer3) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
        $ans3 = $row['ans3chs'];

        $updateValue = ("UPDATE pollsanswered SET ans3chs = $ans3 + 1 WHERE pollNum = $pollNum ");
        $sqlQuery1 = mysqli_query($db, $updateValue);
        header('Location: createPoll.php');
    }
    elseif(isset($answer4) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
        $ans4 = $row['ans4chs'];

        $updateValue = ("UPDATE pollsanswered SET ans4chs = $ans4 + 1 WHERE pollNum = $pollNum ");
        $sqlQuery1 = mysqli_query($db, $updateValue);
        header('Location: createPoll.php');
    }
    elseif(isset($answer5) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
        $ans5 = $row['ans5chs'];

        $updateValue = ("UPDATE pollsanswered SET ans5chs = $ans5 + 1 WHERE pollNum = $pollNum ");
        $sqlQuery1 = mysqli_query($db, $updateValue);
        header('Location: createPoll.php');
    }
    elseif(isset($answer6) == true){
        $retrieve = ("SELECT * FROM pollsanswered WHERE pollNum = $pollNum");
        $sqlQuery = mysqli_query($db, $retrieve);
        $row = mysqli_fetch_assoc($sqlQuery);
        $ans6 = $row['ans6chs'];

        $updateValue = ("UPDATE pollsanswered SET ans4chs = $ans6 + 1 WHERE pollNum = $pollNum ");
        $sqlQuery1 = mysqli_query($db, $updateValue);
        header('Location: createPoll.php');
    }
}
?>