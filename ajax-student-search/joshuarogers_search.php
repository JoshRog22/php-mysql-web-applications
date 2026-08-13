<?php
/*
Author: Joshua Rogers
Course Code: CSCI 4000
Program Date: July 28, 2026
Purpose: Retrieves students with GPAs higher than the minimum
         GPA entered by the user.
*/

// Get the GPA value sent from index.htm.
$minimum_gpa = filter_input(INPUT_GET, 'gpa', FILTER_VALIDATE_FLOAT);

// Validate the GPA value.
if ($minimum_gpa === false || $minimum_gpa === null) {
    echo '<p>Please enter a valid minimum GPA.</p>';
    exit;
}

// Database connection information.
$dsn = 'mysql:host=localhost;dbname=joshua_rogers_assignment_db';
$username = 'joshuaweb';
$password = 'joshuachocolate';

try {

    // Create the PDO database connection.
    $db = new PDO($dsn, $username, $password);

    $db->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    // Search for students with GPA values higher than the user input.
    $query = '
        SELECT studentID, name, email, GPA
        FROM student
        WHERE GPA > :minimum_gpa
        ORDER BY studentID
    ';

    $statement = $db->prepare($query);

    $statement->bindValue(
        ':minimum_gpa',
        $minimum_gpa
    );

    $statement->execute();

    $students = $statement->fetchAll(PDO::FETCH_ASSOC);

    $statement->closeCursor();

} catch (PDOException $e) {

    echo '<p>Unable to connect to the student database.</p>';
    exit;
}

// Display the search heading.
echo '<h2>Student List (Students with GPAs higher than ' .
     htmlspecialchars((string)$minimum_gpa) .
     '):</h2>';

// Display matching student records.
if (count($students) > 0) {

    echo '<table>';

    echo '<thead>';
    echo '<tr>';
    echo '<th>Student ID</th>';
    echo '<th>Name</th>';
    echo '<th>Email</th>';
    echo '<th>GPA</th>';
    echo '</tr>';
    echo '</thead>';

    echo '<tbody>';

    foreach ($students as $student) {

        echo '<tr>';

        echo '<td>' .
            htmlspecialchars((string)$student['studentID']) .
            '</td>';

        echo '<td>' .
            htmlspecialchars($student['name']) .
            '</td>';

        echo '<td>' .
            htmlspecialchars($student['email']) .
            '</td>';

        echo '<td>' .
            htmlspecialchars((string)$student['GPA']) .
            '</td>';

        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

} else {

    echo '<p>No students were found with GPAs higher than that value.</p>';
}
?>