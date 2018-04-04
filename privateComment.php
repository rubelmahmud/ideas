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
                $query = "SELECT *
FROM student_ideas, comment, category
WHERE student_ideas.ideas_number=comment.ideas_number
AND student_ideas.category_id=category.category_id
And comment_type ='1'";
                $result = mysqli_query($conn, $query);
                ?>


            <div id="respond" class="clearfix">
                <div class="line"></div>
                <h4>PRIVATE COMMENT</h4>

                <div class="table-responsive">
                    <table class="table table-bordered nobottommargin">
                        <thead>
                        <tr style="background-color: #1bbc9b; color: white;">
                            <th>No.</th>
                            <th>Comment</th>
                            <th>Comment Date</th>
                            <th>Idea Title</th>
                            <th>Category</th>

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
                                            <td><?php echo $row["comment_description"];?></td>
                                            <td><?php echo date("d F, Y", strtotime($row["comment_time"])); ?></td>
                                            <td><?= $row['ideas_title'] ?></td>
                                            <td><?php echo $row["category_name"];?></td>

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