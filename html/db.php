

<?php

$host = 'localhost';
$database = 'explorenow_db';
$user = 'root';
$password = 'range rover';

$con = new mysqli($host, $user, $password, $database);

if ($con->connect_error) {
    die('Connection failed: ' . $con->connect_error); // Use die() for fatal errors
} else {
    echo 'Connected to database';
}

?>

