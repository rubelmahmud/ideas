<?php
session_start();
include 'header.php';


if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

if (isset($_GET["message"])) {
        echo '<script>alert("' . $_GET["message"] . '");</script>';
}
?>

<!-- Content
		============================================= -->
<section id="content">

    <div class="content-wrap">

        <!-- Comment Form
============================================= -->
        <div class="container">


            <div id="respond" class="clearfix">
                    <?php include 'dropDepartment.php' ?>
                <div class="line"></div>

                <h4>Static Report</h4>
<?php include "connect-db.php";
$resultBit = $conn->query("select count(user_id) as user_id
from user,department
where department.department_id=user.department_id
and user_role='0'
and department.department_name='BIT'");
                    foreach ($resultBit as $r) {

                            $bit = $r['user_id'];
                    }
                   // $bitPercent = (100 / $total) * $bit;

                    ?>

<?php
$resultB = $conn->query("select count(student_ideas.ideas_number) as total
from user,department,student_ideas
where department.department_id=user.department_id
and user.user_id=student_ideas.user_id
and department_name='BIT'");

foreach($resultB as $r){
    $total = $r['total'];
} ?>

                <div class="table-responsive">
                    <table class="table table-bordered nobottommargin">

                        <thead>
                        <tr>
                            <th>Department Name</th>
                            <td>BIT</td>
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
                            <td>80</td>
                        </tr>
                        </tbody>

                        <tbody>
                        <tr>
                            <th>Precentage Of Student Contribute</th>
                            <td>80%</td>
                        </tr>
                        </tbody>

                        <tbody>

                        <tr>
                            <th>Number Of Idea Submit</th>
                            <td><?= $total?></td>
                        </tr>
                        </tbody>

                        <tbody>
                        <tr>
                            <th>Percentage Of Idea Submit</th>
                            <td>30%</td>
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

                <h3>Percentage Of departement Contribution</h3>

                <ul class="skills">
                    <li data-percent="80">
                        <span>Student contribution</span>
                        <div class="progress">
                            <div class="progress-percent">
                                <div class="counter counter-inherit counter-instant"><span data-from="0" data-to="80"
                                                                                           data-refresh-interval="30"
                                                                                           data-speed="1100"></span>%
                                </div>
                            </div>
                        </div>
                    </li>
                    <li data-percent="60">
                        <span>Idea Submit</span>
                        <div class="progress">
                            <div class="progress-percent">
                                <div class="counter counter-inherit counter-instant"><span data-from="0" data-to="60"
                                                                                           data-refresh-interval="30"
                                                                                           data-speed="1100"></span>%
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>


                <div class="line"></div>


            </div>


            <div class="line"></div>
        </div><!-- #respond end -->
    </div>

        <?php
        } else {
                echo "<br> <br> <br> " . "<h1 style='color: #ac2925' align='center' >ERROR
                                                -_- </h1>" . "<br> <br>" . " 
                                  <h3 align='center'>Please " . "<a href='login.php'> Login</a>" . " First
                                  </h3>  " . "<br> <br> <br> ";
        }

        include 'footer.php';
        ?>
