<?php
session_start();

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] != 2) {
        include 'userRestrict.php';
} else {

        include 'header.php';


        if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) { ?>

<!-- Content
		============================================= -->
<section id="content">

    <div class="content-wrap">

        <!-- Comment Form
============================================= -->
        <div class="container">


            <div id="respond" class="clearfix">
                    <?php include 'staticDrop.php' ?>
                <div class="line"></div>

                <h4>Static Reports</h4>
                    <?php include "connect-db.php";

                    //                    Number Of Student
                    $resultBit = $conn->query("select count(user_id) as user_id
from user,department
where department.department_id=user.department_id
and user_role='0'
and department.department_name='L4DC'");
                    foreach ($resultBit as $r) {

                            $bit = $r['user_id'];
                    }
                    ?>

                <!--Number Of Contribution -->
                    <?php
                    $resultC = $conn->query("SELECT COUNT(comment_id) AS Total
FROM department,user,comment
WHERE department.department_id=user.department_id
AND user.user_id=comment.user_id
AND department_name='L4DC'");

                    foreach ($resultC as $rows) {
                            $totalC = $rows['Total'];
                            //
                    } ?>
                <!--Number Of Idea Submit -->
                    <?php
                    $resultB = $conn->query("select count(student_ideas.ideas_number) as total
from user,department,student_ideas
where department.department_id=user.department_id
and user.user_id=student_ideas.user_id
and department_name='L4DC'");

                    foreach ($resultB as $r) {
                            $total = $r['total'];
                    } ?>


                <div class="table-responsive">
                    <table class="table table-bordered nobottommargin">

                        <thead>
                        <tr>
                            <th>Department Name</th>
                            <td>L4DC</td>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <th>Number Of Student</th>
                            <td><?= $bit ?></td>
                        </tr>
                        </tbody>

                        <tbody>
                        <tr>
                            <th>Number Of Student contribute</th>
                            <td><?= $totalC ?></td>
                        </tr>
                        </tbody>

                        <tbody>

                        <tr>
                            <th>Number Of Idea Submit</th>
                            <td><?= $total ?></td>
                        </tr>
                        </tbody>

                    </table>
                </div>
                <div class="line"></div>

            </div>


            <!-- Post Content
============================================= -->
            <div class="postcontent nobottommargin clearfix">

                <div class="clear"></div>

                <div class="divider"><i class="icon-circle"></i></div>

                <h3>Percentage Of department Contribution</h3>
                    <?php

                    $resultConTo = $conn->query("SELECT count(*) as Total from comment");

                    foreach ($resultConTo as $r) {
                            $totalConTo = $r['Total'];
                    }


                    $resultCon = $conn->query("SELECT COUNT(comment_id) AS Total
FROM department,user,comment
WHERE department.department_id=user.department_id
AND user.user_id=comment.user_id
AND department_name='L4DC'");
                    foreach ($resultCon as $r) {

                            $bit = $r['Total'];
                    }
                    $conPercent = (100 / $totalConTo) * $bit;

                    ?>
                <ul class="skills">
                    <li data-percent="<?= $conPercent ?>">
                        <span>Student contribution</span>
                        <div class="progress">
                            <div class="progress-percent">
                                <div class="counter counter-inherit counter-instant"><span data-from="0"
                                                                                           data-to="<?= $conPercent ?>"
                                                                                           data-refresh-interval="30"
                                                                                           data-speed="1100"></span>%
                                </div>
                            </div>
                        </div>
                    </li>

                        <?php

                        $resultIs = $conn->query("SELECT count(*) as Total from student_ideas");

                        foreach ($resultIs as $r) {
                                $totalIs = $r['Total'];
                        }

                        $resultIdea = $conn->query("SELECT COUNT(ideas_number) AS total
FROM student_ideas,department,user
WHERE department.department_id=user.department_id
AND user.user_id=student_ideas.user_id
AND department_name='L4DC'");
                        foreach ($resultIdea as $r) {

                                $bit = $r['total'];
                        }
                        $bitPercent = (100 / $totalIs) * $bit;
                        ?>


                    <li data-percent="<?= $bitPercent ?>">
                        <span>Idea Submit</span>
                        <div class="progress">
                            <div class="progress-percent">
                                <div class="counter counter-inherit counter-instant"><span data-from="0"
                                                                                           data-to="<?= $bitPercent ?>"
                                                                                           data-refresh-interval="30"
                                                                                           data-speed="1100"></span>%
                                </div>
                            </div>
                        </div>
                    </li>
                    <br> <br> <br>
                </ul>


            </div>


            <div class="line"></div>
        </div><!-- #respond end -->
    </div>
        <?php
        } else {
                include 'userLoginFirst.php';
        }

        include 'footer.php';
        } ?>
