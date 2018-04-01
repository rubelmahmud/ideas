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
                include 'connect-db.php';
                $query = "SELECT COUNT(page_id) AS View, page_views.ideas_number,ideas_title, user_name FROM page_views 
RIGHT JOIN student_ideas ON page_views.ideas_number=student_ideas.ideas_number 
LEFT JOIN user ON page_views.user_id = user.user_id
GROUP BY page_views.ideas_number
ORDER BY page_views.ideas_number DESC";

                $result = mysqli_query($conn, $query);
                ?>

                <section id="content">
                        <div class="content-wrap">
                                <div class="container">
                                        <h3 align="center">MOST IDEA VIEWED</h3>
                                        <br/>
                                        <div class="table-responsive">
                                                <table id="idea_data" class="table table-striped table-bordered">
                                                        <thead>
                                                        <tr>
                                                                <th>No.</th>
                                                                <th>Idea Title</th>
                                                                <th>Idea By</th>
                                                                <th>Views</th>
                                                                <th></th>

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
                                                                                <td><?php echo $row["user_name"]; ?></td>
                                                                                <td><?php echo $row["View"]; ?></td>


                                                                                <?php } ?>
                                                                        </tr>

                                                                <?php }
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
}  ?>

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