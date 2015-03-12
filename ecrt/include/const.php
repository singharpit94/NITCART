<?php

//authintication data
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'arpit1234');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'myecom');
$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Set the character set:
mysqli_set_charset($dbc, 'utf8');

?>