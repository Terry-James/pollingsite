<?php
// Terry James CS396 Project2

// sets sessions so this page can not be viewed without a valid email
session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.html"); // return to login if email is not set
}
// variables for connecting to database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'pollvoting';

// variables
$poll = $_POST['pollQ'];
$pollAns1 = $_POST['choice1'];
$pollAns2 = $_POST['choice2'];
$pollAns3 = $_POST['choice3'];
$pollAns4 = $_POST['choice4'];
$pollAns5 = $_POST['choice5'];
$pollAns6 = $_POST['choice6'];

$firstName = $_POST['firstN'];
$lastName = $_POST['lastN'];
$userEmail = $_POST['email'];
$userPassword = $_POST['password'];

$numChoices = 0; // keeps track of number of choices for current poll question

// connect to the database or display message if can not connect
$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

// seperates the choice by only executing if a poll question was entered.
if(isset($poll)){
    // set all POST into an array this will give the number of choices entered so it can be added to the database
    $arrChoices = array($pollAns1, $pollAns2, $pollAns3, $pollAns4, $pollAns5, $pollAns6);
    $arrlength = count($arrChoices); // length of array similar to array.length
    // increase choice only if a POST has a value
    for($i = 0; $i <= $arrlength-1; $i++ ){
        if($arrChoices[$i] !== ""){
            $numChoices++;
        }
        else{
            $numChoices = $numChoices;
        }
    }

    // uses prepared statement to insert the poll question and choices
    $pollAdd = mysqli_prepare($db, "INSERT INTO polls (pollQuestion, numofChoices, pollAnswer1, pollAnswer2, pollAnswer3, pollAnswer4, pollAnswer5, pollAnswer6) VALUES (?,?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($pollAdd, "ssssssss", $poll, $numChoices, $pollAns1, $pollAns2, $pollAns3, $pollAns4, $pollAns5, $pollAns6);
    mysqli_stmt_execute($pollAdd);
    
    mysqli_stmt_bind_result($pollAdd, $result);
    mysqli_stmt_fetch($pollAdd);
    mysqli_stmt_close($pollAdd);
    header('Location: createPoll.php'); // return back to poll creation page
}

// used to insert user data an email has to be set to execute this code
if(isset($userEmail)){
    $userInfo = mysqli_prepare($db, "INSERT INTO userData (firstname, lastname, email, password) VALUE (?,?,?,?)");
    mysqli_stmt_bind_param($userInfo, "ssss", $firstName, $lastName, $userEmail, $userPassword);
    mysqli_stmt_execute($userInfo);
    
    mysqli_stmt_bind_result($userInfo, $result);
    mysqli_stmt_fetch($userInfo);
    mysqli_stmt_close($userInfo);
    header('Location: index.html'); // returns back to the login page
}
?>