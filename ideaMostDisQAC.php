<?php
session_start();
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != 3){
        include 'userRestrict.php';
}else{

include 'header.php';


if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

?>

                <!-- Content
                              ============================================= -->

        <?php
        include 'connect-db.php';
        $uId = $_SESSION['user_id'];
        $queryDep = "SELECT * FROM user, department
WHERE user.department_id = department.department_id
AND user.user_id =$uId";

        $resultDep = mysqli_query($conn, $queryDep);
        foreach ($resultDep as $r) {

                $dep = $r['department_id'];
                $depN = $r['department_name'];
        }


        $query = "SELECT COUNT(thumbs_id) AS Dis, thumbsupdown.ideas_number, ideas_title FROM thumbsupdown
left JOIN student_ideas ON thumbsupdown.ideas_number=student_ideas.ideas_number
right join user on student_ideas.user_id = user.user_id
INNER JOIN department on user.department_id=department.department_id
WHERE department.department_id=$dep
AND thumbsupdown.type='0'

GROUP BY thumbsupdown.ideas_number
ORDER BY Dis DESC";

        $result = mysqli_query($conn, $query);
        ?>

                <section id="content">
                        <div class="content-wrap">
                                <div class="container">
                                        <h3 align="center">MOST DISLIKED IDEAS</h3>
                                    <h5 align="center">My Department Wise (<?php echo $depN?>)</h5>
                                        <br/>
                                        <div class="table-responsive">
                                                <table id="idea_data" class="table table-striped table-bordered">
                                                        <thead>
                                                        <tr>
                                                                <th>No.</th>
                                                                <th>Idea Title</th>
                                                                <th>Total Unlikes</th>
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
                                                                                <td><?php echo $row["Dis"]; ?></td>


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