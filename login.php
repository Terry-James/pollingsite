<?php
session_start();
?>

<?php
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'pollvoting';
$userEmail = $_POST['email'];
$userPassword = $_POST['password'];

$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

$userEmail = stripslashes($userEmail);
$userPassword = stripslashes($userPassword);
$userEmail = mysqli_real_escape_string($db, $userEmail);
$userPassword = mysqli_real_escape_string($db, $userPassword);

if(isset($userEmail) && isset($userPassword)){
    $lookUP = ("SELECT * FROM userData WHERE email = '$userEmail'");
    $qlookUp = mysqli_query($db, $lookUP);
    $row = mysqli_fetch_assoc($qlookUp);

    //print_r($row);
    if($row['email'] === $userEmail && $row[password] === $userPassword){
        $_SESSION['email'] = $userEmail;
        header('Location: createPoll.php');
    }
    else{
        header('Location: index.html');
    }
}

?>