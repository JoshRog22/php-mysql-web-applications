<?php
/*
Author: Joshua Rogers
Course: CSCI 4000-W01
Program Date: July 26, 2026
File: joshua_rogers_error.php

Purpose:
Displays application error messages when invalid
or missing data is submitted.
*/
?>

<!-- Include the common page header -->
<?php include __DIR__ . '/../view/joshua_rogers_header.php'; ?>

<div class="main-content">

    <!-- Page heading -->
    <h1>Error</h1>

    <!-- Display the error message -->
    <p><?php echo $error; ?></p>

</div>

<!-- Include the common page footer -->
<?php include __DIR__ . '/../view/joshua_rogers_footer.php'; ?>