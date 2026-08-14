<?php
/*
Author: Joshua Rogers
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
