<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.html");
}
// variables
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'pollvoting';

$poll = $_POST['pollQ'];
$numChoices = 0;
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


$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");



if(isset($poll)){
    $arrChoices = array($pollAns1, $pollAns2, $pollAns3, $pollAns4, $pollAns5, $pollAns6);
    $arrlength = count($arrChoices);
    for($i = 0; $i <= $arrlength-1; $i++ ){
        if($arrChoices[$i] !== ""){
            $numChoices++;
        }
        else{
            $numChoices = $numChoices;
        }
    }
    $pollAdd = mysqli_prepare($db, "INSERT INTO polls (pollQuestion, numofChoices, pollAnswer1, pollAnswer2, pollAnswer3, pollAnswer4, pollAnswer5, pollAnswer6) VALUES (?,?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($pollAdd, "ssssssss", $poll, $numChoices, $pollAns1, $pollAns2, $pollAns3, $pollAns4, $pollAns5, $pollAns6);
    mysqli_stmt_execute($pollAdd);
    
    mysqli_stmt_bind_result($pollAdd, $result);
    mysqli_stmt_fetch($pollAdd);
    mysqli_stmt_close($pollAdd);
    header('Location: createPoll.php'); 
}

if(isset($userEmail)){
    $userInfo = mysqli_prepare($db, "INSERT INTO userData (firstname, lastname, email, password) VALUE (?,?,?,?)");
    mysqli_stmt_bind_param($userInfo, "ssss", $firstName, $lastName, $userEmail, $userPassword);
    mysqli_stmt_execute($userInfo);
    
    mysqli_stmt_bind_result($userInfo, $result);
    mysqli_stmt_fetch($userInfo);
    mysqli_stmt_close($userInfo);
    header('Location: index.html');
}
?>