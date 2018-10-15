<?php
// Terry James CS396 Project2

session_start();
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();

header('Location: index.html'); // return to login page

?>