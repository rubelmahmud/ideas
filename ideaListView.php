<?php
session_start();

        include 'header.php';


        if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

                ?>
            <!-- Page Title
                          ============================================= -->
            <section id="page-title">

                <div class="container clearfix">

                    <h1>Ideas</h1>
                    <span>View Ideas</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Idea</li>
                    </ol>
                </div>

            </section><!-- #page-title end -->
            <!-- Content
                       ============================================= -->
<?php
include 'connect-db.php';
$query = "SELECT * FROM student_ideas, user, category
WHERE student_ideas.user_id = user.user_id AND
student_ideas.category_id = category.category_id
ORDER BY student_ideas.posted_time DESC ";
                $result = mysqli_query($conn, $query);
                ?>

<section id="content">
    <div class="content-wrap">
            <div class="container">
                <h3 align="center">IDEA LIST</h3>
                <br/>
                <div class="table-responsive">
                    <table id="idea_data" class="table table-striped table-bordered" style="margin-top: 15px;">
                        <thead>
                        <tr style="background-color: #1bbc9b; color: white;">
                            <th>No.</th>
                            <th>Idea Title</th>
                            <th>Idea Description</th>
                            <th>Category</th>
                            <th>Idea Posted</th>
                            <th>Comment Closer Date</th>
                            <th>Idea By</th>
                            <th>Click View Details</th>
                        </tr>
                        </thead>
                <?php
                if(mysqli_num_rows($result) > 0)
                {
                        while($row = mysqli_fetch_array($result))
                        {
                                ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <a href="ideaSingle.php?ideas_number=<?php echo $row['ideas_number']; ?>"><?= $row['ideas_title'] ?></a>
                                    </td>
                                    <td><?php echo $row["ideas_description"]; ?></td>
                                    <td><?php echo $row["category_name"]; ?></td>
                                    <td><?php echo date("d F, Y", strtotime($row["posted_time"])); ?></td>
                                    <td><?php echo date("d F, Y", strtotime($row["ideas_final_closer_date"])); ?></td>

                                    <td><?php if ($row["ideas_type"] == 1){
                                                    echo "Anonymous";
                                            } else {
                                             echo $row["user_name"]; ?>
                                    </td>
                                        <?php } ?>
                                    <td>
                                        <a href="ideaSingle.php?ideas_number=<?php echo $row['ideas_number']; ?>">VIEW DETAILS</a>
                                    </td>
                                </tr>

                            <?php } }
                            ?>
                    </table>
                </div>
            </div>
    </div>
</section>
<?php
        } else {
                include 'userLoginFirst.php';
        }

        include 'footer.php';
 ?>


<script>
    $(document).ready(function(){
        $('#idea_data').DataTable({
            "pageLength": 5
            // "lengthChange": false
        });
    });
</script>


<style>
    thead {
        counter-reset: Serial; /* Set the Serial counter to 0 */
    }

    tr td:first-child:before {
        counter-increment: Serial; /* Increment the Serial counter */
        content: counter(Serial); /* Display the counter */
    }
</style>