<?php
/*
Author: Joshua Rogers

Purpose:
This file connects to the MySQL database using PDO.
This file contains PHP code only and should not display HTML.
*/

// Database connection information
$dsn = 'mysql:host=localhost;dbname=joshua_rogers_assignment_db';
$username = 'joshuaweb';
$password = 'joshuachocolate';

try {
    // Creates a PDO database connection
    $db = new PDO($dsn, $username, $password);

    // Sets PDO to throw exceptions if a database error occurs
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Stores the database error message and displays the custom error page
    $error_message = $e->getMessage();
    include('joshua_rogers_database_error.php');
    exit();
}
?>
