<?php
/*
Author: Joshua Rogers

Purpose:
This page displays a database connection error message.
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>joshua rogers's kung fu school</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <!-- Main page container -->
    <main class="container">
        <!-- Page heading -->
        <h1>joshua rogers kung fu school</h1>

        <!-- Error section -->
        <section class="error">
            <h2>Database Error</h2>
            <p>There was an error connecting to the database.</p>
            <p>Error message: <?php echo htmlspecialchars($error_message); ?></p>
        </section>
    </main>
</body>
</html>
