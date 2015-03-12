<?php

// This is the logout page for the site.
// This script is created in Chapter 4.

// Require the configuration before any PHP code as the configuration controls error reporting:
require ('include/config.php');
// The config file also starts the session.

// If the user isn't logged in, redirect them:
redirect_invalid_user();
$_SESSION = array(); // Destroy the variables.
session_destroy(); // Destroy the session itself.
setcookie (session_name(), '', time()-300); // Destroy the cookie.
//$url='display.php';
header("Location: display.php");
// Include the header file:
//$page_title = 'Logout';
//echo '<h3>Logged Out</h3><p>Thank you for visiting. You are now logged out. Please come back soon!</p>';
//header("display.php");
// require_once("include/connection.php"); ?>