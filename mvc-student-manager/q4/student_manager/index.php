<?php
/*
Author: Joshua Rogers

Purpose:
This file acts as the student manager controller.
It receives an action, calls the appropriate model functions,
and prepares student and major data for display.
*/

// Load the PDO database connection
require_once __DIR__ .
    '/../model/joshua_rogers_database.php';

// Load the major database functions
require_once __DIR__ .
    '/../model/joshua_rogers_major_db.php';

// Load the student database functions
require_once __DIR__ .
    '/../model/joshua_rogers_student_db.php';

/*
Check for an action submitted through POST.
If no POST action exists, check the URL for a GET action.
*/
$action = filter_input(INPUT_POST, 'action');

if ($action === null) {
    $action = filter_input(INPUT_GET, 'action');
}

// Use list_students as the first-access/default action
if ($action === null) {
    $action = 'list_students';
}

// Handle the list_students action
if ($action === 'list_students') {

    // Get the selected major ID from the URL
    $major_id = filter_input(
        INPUT_GET,
        'major_id',
        FILTER_VALIDATE_INT
    );

    // Use major ID 1 when no valid major is selected
    if ($major_id === null || $major_id === false) {
        $major_id = 1;
    }

    // Retrieve all majors
    $majors = get_majors();

    // Retrieve the selected major name
    $major_name = get_major_name($major_id);

    // Retrieve students in the selected major
    $students = get_students_by_major($major_id);

    // Display the student list view
    include __DIR__ .
        '/joshua_rogers_student_list.php';
}
else if ($action === 'delete_student') {

    // Get the student ID submitted by the delete form
    $student_id = filter_input(
        INPUT_POST,
        'student_id',
        FILTER_VALIDATE_INT
    );

    // Get the selected major ID so the same list can reload
    $major_id = filter_input(
        INPUT_POST,
        'major_id',
        FILTER_VALIDATE_INT
    );

    // Delete the student when a valid student ID is received
    if ($student_id !== null && $student_id !== false) {
        delete_student($student_id);
    }

    // Return to the selected major after deletion
    header(
        'Location: .?action=list_students&major_id=' .
        urlencode((string) $major_id)
    );

    exit();
}

else if ($action === 'show_add_form') {

    // Retrieve all majors for the dropdown list
    $majors = get_majors();

    // Display the add student form
    include __DIR__ .
        '/joshua_rogers_student_add.php';
}
?>
