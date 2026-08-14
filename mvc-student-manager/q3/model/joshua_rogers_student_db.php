<?php
/*
Author: Joshua Rogers

Purpose:
This model file contains database functions related to
the student table.
*/

/*
Retrieves all student records for a selected major.

Parameter:
$major_id - The ID of the selected major.

Return:
An array containing all students in the selected major,
sorted by student ID.
*/
function get_students_by_major($major_id)
{
    // Use the PDO connection created in the database file
    global $db;

    // Select students who belong to the selected major
    $query = 'SELECT studentID, firstName, lastName, gender, majorID
              FROM student
              WHERE majorID = :major_id
              ORDER BY studentID';

    $statement = $db->prepare($query);
    $statement->bindValue(':major_id', $major_id);
    $statement->execute();

    // Retrieve all matching student records
    $students = $statement->fetchAll();

    // Close the database cursor
    $statement->closeCursor();

    // Return the student records
    return $students;
}

/*
Deletes one student record from the database.
Parameter: $student_id - The ID of the student to delete.
*/
function delete_student($student_id)
{
    // Use the PDO connection created in the database file
    global $db;

    // Delete the selected student
    $query = 'DELETE FROM student
              WHERE studentID = :student_id';

    $statement = $db->prepare($query);
    $statement->bindValue(':student_id', $student_id);
    $statement->execute();

    // Close the database cursor
    $statement->closeCursor();
}
