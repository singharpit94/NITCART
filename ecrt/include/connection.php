<?php
//connection to database
require("const.php");
$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Set the character set:
mysqli_set_charset($dbc, 'utf8');

// Function for escaping and trimming form data.
// Takes one argument: the data to be treated (string).
// Returns the treated data (string).
function escape_data($data) { 

	global $dbc; // Database connection.
	
	// Strip the slashes if Magic Quotes is on:
	if (get_magic_quotes_gpc()) $data = stripslashes($data);
	
	// Apply trim() and mysqli_real_escape_string():
	return mysqli_real_escape_string ($dbc, trim ($data));
	
} 
function get_password_hash($password) {
	
	// Need the database connection:
	global $dbc;
	
	// Return the escaped password:
	return mysqli_real_escape_string ($dbc, hash_hmac('sha256', $password, 'c#haRl891', true));
	
} 
   ?>