<?php
/*
Author: Joshua Rogers
*/


// Load the PDO database connection
require_once __DIR__ .
    '/../model/joshua_rogers_database.php';


// Load the major database functions
require_once __DIR__ .
    '/../model/joshua_rogers_major_db.php';


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


/*
Temporarily test the controller and major model.

Question 1 only requires the controller to retrieve and
display major ID 1 and its corresponding major name.
*/
if ($action === 'list_students') {
    $major_id = 1;
    $major_name = get_major_name($major_id);
}


// Display the common page header
include __DIR__ . '/../view/joshua_rogers_header.php';
?>

<!-- Temporary Question 1 controller test -->
<section>
    <h2>MVC Major Test</h2>

    <p>
        <strong>Major ID:</strong>
        <?php
        echo htmlspecialchars(
            (string) $major_id,
            ENT_QUOTES,
            'UTF-8'
        );
        ?>
    </p>

    <p>
        <strong>Major Name:</strong>
        <?php
        echo htmlspecialchars(
            $major_name,
            ENT_QUOTES,
            'UTF-8'
        );
        ?>
    </p>
</section>

<?php
// Display the common page footer
include __DIR__ . '/../view/joshua_rogers_footer.php';
?>
