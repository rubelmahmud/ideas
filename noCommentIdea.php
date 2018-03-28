<?php
session_start();
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != 2){
        include 'userRestrict.php';
}else{
include 'header.php';


if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

?>

<!-- Content
        ============================================= -->
<section id="content">

    <div class="content-wrap">

        <!-- Comment Form
============================================= -->
        <div class="container">

            <div id="respond" class="clearfix">
                <h3>Choose an oprion for <span>Exception Report</span></h3>



            </div><!-- #respond end -->
                <?php
                include 'dropException.php';
                ?>

                <?php
                include 'connect-db.php';
                $query = "SELECT DISTINCT * FROM student_ideas
WHERE NOT EXISTS (SELECT * FROM comment
WHERE student_ideas.ideas_number = comment.ideas_number)";
                $result = mysqli_query($conn, $query);
                ?>


            <div id="respond" class="clearfix">
                <div class="line"></div>
                <h4>NO COMMENT IDEA</h4>

                <div class="table-responsive">
                    <table class="table table-bordered nobottommargin">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Idea</th>
                            <th>Posted Date</th>
                        </tr>
                        </thead>
                            <?php
                            if(mysqli_num_rows($result) > 0)
                            {
                                    while($row = mysqli_fetch_array($result))
                                    {
                                            ?>

                                        <tbody>
                                        <tr>
                                            <td> </td>
                                            <td><?= $row['ideas_title'] ?></td>
                                            <td><?php echo date("d F, Y", strtotime($row["posted_time"])); ?></td>

                                        </tr>
                                        </tbody>

                                            <?php
                                    }
                            }
                            ?>
                    </table>
                </div>
                <div class="line"></div>

            </div><!-- #respond end -->
        </div>


            <?php
            } else {
                    include 'userLoginFirst.php';
            }

            include 'footer.php';
            }?>

        <!-- Serial No of Table Entry -->
        <style>
            thead {
                counter-reset: Serial; /* Set the Serial counter to 0 */
            }

            tr td:first-child:before {
                counter-increment: Serial; /* Increment the Serial counter */
                content: counter(Serial); /* Display the counter */
            }
        </style>