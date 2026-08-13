<?php
/*
Author: Joshua Rogers
Course: CSCI 4000-W01
Program Date: July 26, 2026
File: joshua_rogers_student_add.php

Purpose:
This view file displays a form that allows users
to add a new student.
*/

// Display the common page header
include __DIR__ .
    '/../view/joshua_rogers_header.php';
?>

<section>
    <div class="main-content">
        <h2>Add Student</h2>

        <!-- Form used to submit a new student -->
        <form action="." method="post">

            <!-- Tell the controller to add a student -->
            <input
                type="hidden"
                name="action"
                value="add_student">

            <!-- Dropdown list of available majors -->
            <label for="major_id">Major:</label>
            <select id="major_id" name="major_id">
                <?php foreach ($majors as $major) : ?>
                    <option value="<?php
                        echo htmlspecialchars(
                            (string) $major['majorID'],
                            ENT_QUOTES,
                            'UTF-8'
                        );
                    ?>">
                        <?php
                        echo htmlspecialchars(
                            $major['majorName'],
                            ENT_QUOTES,
                            'UTF-8'
                        );
                        ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <br>

            <!-- Student first name -->
            <label for="first_name">First Name:</label>
            <input
                type="text"
                id="first_name"
                name="first_name"
				required>

            <br>

            <!-- Student last name -->
            <label for="last_name">Last Name:</label>
            <input
                type="text"
                id="last_name"
                name="last_name"
				required>

            <br>

            <!-- Student gender -->
            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>

            <br>

            <!-- Submit the completed form -->
            <label>&nbsp;</label>
            <input
                type="submit"
                value="Add Student">

            <br><br>

            <!-- Return to the student list -->
            <p>
                <a href=".?action=list_students">
                    View All Students
                </a>
            </p>

        </form>
    </div>
</section>

<?php
// Display the common page footer
include __DIR__ .
    '/../view/joshua_rogers_footer.php';
?>