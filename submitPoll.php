<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.html");
}

$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'pollvoting';
$answer1 = $_POST['ans1'];


$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");



?>