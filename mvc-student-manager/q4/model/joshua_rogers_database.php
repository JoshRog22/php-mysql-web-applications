<?php
/*
Author: Joshua Rogers

Purpose:
This model file creates a PDO connection to the
joshua_rogers_student_db database. If the connection fails,
the database error view is displayed.
*/


// Database connection information
$dsn = 'mysql:host=localhost;dbname=joshua_rogers_student_db';
$username = 'joshuarogers1';
$password = 'joshuaisgreat';


try {
    // Create the PDO database connection
    $db = new PDO($dsn, $username, $password);

    // Configure PDO to report database errors as exceptions
    $db->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {
    // Save the database error message for the error view
    $error_message = $e->getMessage();

    // Display the database error page
    include __DIR__ .
        '/../errors/joshua_rogers_database_error.php';

    // Stop the rest of the program
    exit();
}
