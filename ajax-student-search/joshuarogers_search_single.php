<?php
/*
Author: Joshua Rogers
Course Code: CSCI 4000
Program Date: July 29, 2026
Assignment: Assignment 6 - Question 4
File: joshuarogers_search_single.php

Purpose:
This PHP file receives a studentID from an AJAX request,
retrieves the matching student with PDO, and returns the
student data as a double-pipe-delimited string.
*/

// Retrieve and validate the studentID sent by AJAX.
$student_id = filter_input(
    INPUT_GET,
    'studentID',
    FILTER_VALIDATE_INT
);

// Return an error value if the studentID is invalid.
if ($student_id === false || $student_id === null || $student_id < 1) {
    echo 'INVALID_ID';
    exit;
}

// Database connection information.
$dsn = 'mysql:host=localhost;dbname=joshua_rogers_assignment_db';
$username = 'joshuaweb';
$password = 'joshuachocolate';

try {
    // Create the PDO database connection.
    $db = new PDO($dsn, $username, $password);

    // Configure PDO to report database errors as exceptions.
    $db->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    /*
    Retrieve the student whose studentID matches the value
    entered by the user.
    */
    $query = '
        SELECT studentID, name, email, GPA
        FROM student
        WHERE studentID = :student_id
    ';

    // Prepare the SQL statement.
    $statement = $db->prepare($query);

    // Bind the submitted studentID to the SQL placeholder.
    $statement->bindValue(
        ':student_id',
        $student_id,
        PDO::PARAM_INT
    );

    // Execute the prepared statement.
    $statement->execute();

    // Retrieve one matching student record.
    $student = $statement->fetch(PDO::FETCH_ASSOC);

    // Close the database cursor.
    $statement->closeCursor();

    // Return a message if no matching student was found.
    if ($student === false) {
        echo 'NOT_FOUND';
        exit;
    }

    /*
    Return the four values separated by double pipe symbols.
    JavaScript uses responseText.split("||") to separate them.
    */
    echo $student['studentID'] . '||' .
         $student['name'] . '||' .
         $student['email'] . '||' .
         $student['GPA'];

} catch (PDOException $e) {
    /*
    Do not display technical database information to the user.
    Return a simple error value to the AJAX page.
    */
    echo 'DATABASE_ERROR';
}
?>