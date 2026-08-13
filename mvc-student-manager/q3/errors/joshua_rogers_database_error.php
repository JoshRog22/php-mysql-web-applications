<?php
/*
Author: Joshua Rogers
Course: CSCI 4000-W01
Program Date: July 25, 2026
File: joshua_rogers_database_error.php

Purpose:
This error view displays a database connection error.
It uses the common header and footer view files.
*/


// Display the common page header
include __DIR__ . '/../view/joshua_rogers_header.php';
?>

<!-- Database connection error information -->
<section class="error-message">
    <h2>Database Error</h2>

    <p>There was an error connecting to the database.</p>

    <p>
        <strong>Error message:</strong>
        <?php
        echo htmlspecialchars(
            $error_message,
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