<?php
// Terry James CS396 Project2
session_start(); // starts sessions here
?>

<?php
// variables
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'pollvoting';
$userEmail = $_POST['email'];
$userPassword = $_POST['password'];

// Connect to database
$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

// Used for security reasons
$userEmail = stripslashes($userEmail);
$userPassword = stripslashes($userPassword);
$userEmail = mysqli_real_escape_string($db, $userEmail);
$userPassword = mysqli_real_escape_string($db, $userPassword);

// Checks if email and password have been entered
if(isset($userEmail) && isset($userPassword)){
    $lookUP = ("SELECT * FROM userData WHERE email = '$userEmail'");
    $qlookUp = mysqli_query($db, $lookUP);
    $row = mysqli_fetch_assoc($qlookUp);

    // Check if the email and password entered is the same type and value stored in the database
    if($row['email'] === $userEmail && $row[password] === $userPassword){
        $_SESSION['email'] = $userEmail; // set the email to a session variable 
        header('Location: createPoll.php'); // move to create a poll page
    }
    else{ // if email or password is incorrect return to login page
        header('Location: index.html');
    }
}

?>