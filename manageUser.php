<?php
session_start();
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] != 4) {
        include 'userRestrict.php';
} else {

        include 'header.php';


        if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

//1. connect database
                include 'connect-db.php';
                //2. generate query to select all data from db table
$sql = "SELECT * FROM `user`, `department`, `user_role`
WHERE user.user_role = user_role.user_role
AND user.department_id =department.department_id
ORDER BY `user`.`user_id`  ASC";

                //3. execute query to get result
                $resultSet = $conn->query($sql); ?>

            <!-- Content
     =============================================
            4. show data in html table -->
            <section id="content">

                <div class="content-wrap">


                    <!-- Comment Form
            ============================================= -->
                    <div class="container">
                        <div class="welcome" align="right">
                                <?php echo "Welcome ".$_SESSION['user_email']?>
                        </div>

                        <h4>Manage User</h4>
                            <?php
                            if (isset($_SESSION['successIdea'])) {
                                    ?>

                                <div class="alert alert-success">
                                    <i class="icon-thumbs-up"></i><strong>This user has been removed</strong>
                                </div>
                                    <?php
                                    unset($_SESSION['successIdea']);

                            }
                            ?>
                        <div class="table-responsive">
                            <table class="table table-bordered nobottommargin">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Role</th>
                                    <th>Update User</th>
                                    <th>Remove User</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($resultSet as $row) { ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $row['user_name'] ?></td>
                                        <td><?= $row['user_email'] ?></td>
                                        <td><?= $row['user_address'] ?></td>
                                        <td><?= $row['user_phone'] ?></td>
                                        <td><?= $row['department_name'] ?></td>
                                        <td><?= $row['user_role_name'] ?></td>
                                        <td><a href="userStdUpdate.php?user_id=<?= $row['user_id'] ?>">Update</td>
                                        <td><a href="userDelete.php?user_id=<?= $row['user_id'] ?>">Remove</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="line"></div>

                    </div><!-- #respond end -->
                </div>
            </section>


        <?php } else {
                include 'userLoginFailed.php';
        }

        include 'footer.php';
} ?>

<!--  UPDATE `user` SET `user_phone` = '01912311291' WHERE `user`.`user_id` = 6; -->


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
