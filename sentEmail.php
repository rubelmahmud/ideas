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
        } ?>

<!-- Content
		============================================= -->
<section id="content">

    <div class="content-wrap">

        <!-- Comment Form
============================================= -->
        <div class="container">


            <div id="respond" class="clearfix">

                <h3>Send Email to <span>Student</span></h3>
                <h5 style="color: orange;">My Department  ( <?php echo $depN?> )</h5>
                    <?php
                    if (isset($_SESSION['successEmail'])) {
                            ?>

                        <div class="alert alert-success">
                            <i class="icon-thumbs-up"></i><strong>Your email has been sent.</strong>
                        </div>
                            <?php
                            unset($_SESSION['successEmail']);

                    }
                    ?>
 <hr>
                <form class="clearfix" action="sentEmailQAC.php" method="post" id="commentform">

                    <div class="form-group">
                        <label for="category">SELECT A STUDENT</label>
                            <?php

                            $sql = "SELECT * FROM user, department, user_role
WHERE user.department_id = department.department_id
AND user.user_role = user_role.user_role
AND department.department_id =$dep
AND user_role.user_role= '0'";

                            $result = $conn->query($sql);

                            ?>

                        <select class="form-control" name="user_id" id="user" required="required">
                                <?php foreach ($result as $row) { ?>
                                    <option value="<?= $row['user_id'] ?>"><?= $row['user_name'] ?></option>
                                <?php } ?>
                        </select>

                    </div>


                    <div class="clear"></div>

                    <div class="col_full">
                        <label for="comment">Email Body</label>
                        <textarea name="email_body" cols="58" rows="7" tabindex="4"
                                  class="sm-form-control" required="required"></textarea>
                    </div>

                    <div class="col_full nobottommargin">
                        <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit"
                                class="button button-3d nomargin">Sent
                        </button>
                    </div>
                    <div class="line"></div>
                </form>

            </div><!-- #respond end -->
        </div>

     <?php
} else {
        include 'userLoginFirst.php';
}

        include 'footer.php';
}  ?>