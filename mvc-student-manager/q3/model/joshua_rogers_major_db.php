<?php
/*
Author: Joshua Rogers
Course: CSCI 4000-W01
Program Date: July 25, 2026
File: joshua_rogers_major_db.php

Purpose:
This model file contains database functions related to
the major table.
*/


/*
Retrieves the name of a major by using its major ID.

Parameter:
$major_id - The ID of the requested major.

Return:
The name of the selected major.
*/
function get_major_name($major_id)
{
    // Use the PDO connection created in the database file
    global $db;

    // Select the name of the requested major
    $query = 'SELECT majorName
              FROM major
              WHERE majorID = :major_id';

    $statement = $db->prepare($query);
    $statement->bindValue(':major_id', $major_id);
    $statement->execute();

    // Retrieve the major record
    $major = $statement->fetch();

    // Close the database cursor
    $statement->closeCursor();

    // Return an empty string if the major was not found
    if ($major === false) {
        return '';
    }

    // Return the major name
    return $major['majorName'];
}

/*
Retrieves all major records from the database.
Returns an array containing all majors sorted by major ID.
*/
function get_majors()
{
    // Use the PDO connection created in the database file
    global $db;

    // Select all majors and sort them by major ID
    $query = 'SELECT majorID, majorName
              FROM major
              ORDER BY majorID';

    $statement = $db->prepare($query);
    $statement->execute();

    // Retrieve all major records
    $majors = $statement->fetchAll();

    // Close the database cursor
    $statement->closeCursor();

    // Return the major records
    return $majors;
}