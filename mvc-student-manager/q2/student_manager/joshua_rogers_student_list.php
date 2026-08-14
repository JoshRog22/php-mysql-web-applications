<?php
/*
Author: Joshua Rogers

Purpose:
This view file displays students for the selected major.
It also displays links that allow the user to view students
from other majors.
*/

// Display the common page header
include __DIR__ .
    '/../view/joshua_rogers_header.php';
?>

<section>
    <h2>Student List</h2>

    <aside>
        <h3>Majors</h3>

        <nav>
            <ul>
                <?php foreach ($majors as $major) : ?>
                    <li>
                        <a href="?action=list_students&amp;major_id=<?php
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
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>

    <div class="main-content">
        <h3>
            <?php
            echo htmlspecialchars(
                $major_name,
                ENT_QUOTES,
                'UTF-8'
            );
            ?>
        </h3>

        <?php if (count($students) === 0) : ?>
            <p>No students were found for this major.</p>
        <?php else : ?>
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($students as $student) : ?>
                        <tr>
                            <td>
                                <?php
                                echo htmlspecialchars(
                                    (string) $student['studentID'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $student['firstName'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $student['lastName'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $student['gender'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                );
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</section>

<?php
// Display the common page footer
include __DIR__ .
    '/../view/joshua_rogers_footer.php';
?>
