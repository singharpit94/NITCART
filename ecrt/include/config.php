<?php
 include("include/function.php");

define ('BASE_URI', 'C:\xampp\htdocs/ecrt/');
define ('BASE_URL', 'localhost/ecrt/');
define ('PDFS_DIR', BASE_URI . 'pdfs/'); // Added in Chapter 5.
define ('MYSQL', BASE_URI . 'connection.php');
function redirect_invalid_user($check = 'user_id', $destination = 'display.php', $protocol = 'http://') {
	
	// Check for the session item:
	if (!isset($_SESSION[$check])) {
		$url = $protocol . BASE_URL . $destination; // Define the URL.
		header("Location: $url");
		exit(); // Quit the script.
	}
	
}
?>