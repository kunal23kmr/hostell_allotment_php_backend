<?php 
session_start(); // start the session
include 'cors.php';

// unset all session variables
$_SESSION = array();

// destroy the session
session_destroy();

// redirect to login page
header("Location: praveshnitj.php");
exit;
?>