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
                <?php
                include "connect-db.php";

// $inum = $_GET['ideas_number'];

                $sql = "SELECT * FROM student_ideas, user, category
WHERE student_ideas.user_id = user.user_id AND
student_ideas.category_id = category.category_id
AND student_ideas.file IS NOT NULL
ORDER BY student_ideas.posted_time DESC ";

                $result = mysqli_query($conn, $sql);
                ?>

            <section id="content">
                <div class="content-wrap">
                    <div class="container">
                        <h4>Download Idea Supporting Document</h4>

                        <div class="table-responsive">
                            <table class="table table-bordered nobottommargin" id="" style="margin-top: 15px; margin-bottom: 15px; width: 1000px;">
                                <thead>
                                <tr style="background-color: #1bbc9b; color: white;">
                                    <th>No.</th>
                                    <th>Idea Title</th>

                                    <th>Category</th>
                                    <th>Idea Posted</th>
                                    <th>Idea By</th>
                                    <th>Attachment</th>

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
                                                    <td>
                                                        <a href="ideaSingle.php?ideas_number=<?php echo $row['ideas_number']; ?>"><?= $row['ideas_title'] ?></a>
                                                    </td>
                                                    <td><?php echo $row["category_name"];?></td>
                                                    <td><?php echo date("d F, Y", strtotime($row["posted_time"])); ?></td>
                                                    <td>
                                                            <?php if ($row["ideas_type"] == 1){
                                                                    echo "Anonymous";
                                                            } else {
                                                                    echo $row["user_name"];
                                                            }?>
                                                    </td>
                                                    <td><a href="<?php echo $row['file']; ?>"><div class="icon-download"></div> Download</a></td>
                                                </tr>
                                                </tbody>
                                                    <?php
                                            }
                                    }
                                    ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- #respond end -->
            </section>




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

<script>
    $(document).ready(function(){
        $('#download_zip').DataTable({
            "pageLength": 10
            // "lengthChange": false
        });
    });
</script>