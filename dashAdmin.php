<?php
session_start();
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != 4){
        include 'userRestrict.php';
}else{
include 'header.php';

if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

?>



<!-- Content
		============================================= -->

<?php

include 'connect-db.php';
?>

<section id="content">
    <hr>
    <div class="content-wrap">

        <div class="container clearfix">
            <div class="col_full">
                <div class="heading-block center nobottomborder">
                    <h2 style="color: #800000;"> SYSTEM DATA STATISTICS</h2>
                   
                </div>

                    <?php
                    $result = $conn->query("SELECT count(*) as Total from user");

                    foreach ($result as $r) {
                            $totalCon = $r['Total'];
                    }
                    ?>


                    <?php
                    $result = $conn->query("SELECT count(*) as Total from user, user_role
WHERE user.user_role = user_role.user_role
AND user_role.user_role=2");

                    foreach ($result as $r) {
                            $totalCo = $r['Total'];
                    }
                    ?>
                    <?php

                    $result = $conn->query("SELECT count(*) as Total from user, user_role
WHERE user.user_role = user_role.user_role
AND user_role.user_role=3");

                    foreach ($result as $r) {
                            $totalI = $r['Total'];
                    }
                    ?>

                    <?php
                    $result = $conn->query("SELECT count(*) as Total from user, user_role
WHERE user.user_role = user_role.user_role
AND user_role.user_role=0");

                    foreach ($result as $r) {
                            $totalC = $r['Total'];
                    }
                    ?>


                <div class="col_one_fourth center" data-animate="bounceIn">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-users"></i>
                    <div class="counter counter-large" style="color: #3498db;"><span data-from="0" data-to="<?=$totalCon?>""
                                                                                     data-refresh-interval="50"
                                                                                     data-speed="2000"></span>
                    </div>
                    <h5>Total User</h5>
                </div>

                <div class="col_one_fourth center" data-animate="bounceIn" data-delay="200">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-user2"></i>
                    <div class="counter counter-large" style="color: #e74c3c;"><span data-from="0" data-to="<?= $totalCo ?>"
                                                                                     data-refresh-interval="50"
                                                                                     data-speed="2500"></span>
                    </div>
                    <h5>Total QA Manager</h5>
                </div>

                <div class="col_one_fourth center" data-animate="bounceIn" data-delay="400">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-user3"></i>
                    <div class="counter counter-large" style="color: #16a085;"><span data-from="0" data-to="<?= $totalI ?>"
                                                                                     data-refresh-interval="50"
                                                                                     data-speed="3500"></span>
                    </div>
                    <h5>Total QA coordinator</h5>
                </div>

                <div class="col_one_fourth center col_last" data-animate="bounceIn" data-delay="600">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-user4"></i>
                    <div class="counter counter-large" style="color: #9b59b6;"><span data-from="0" data-to="<?=$totalC?>" data-refresh-interval="30" data-speed="2700"></span></div>
                    <h5>Total Student</h5>
                </div>
                <!--         2nd statistics       -->

                    <?php
                    $result = $conn->query("SELECT count(*) as Total from department");

                    foreach ($result as $r) {
                            $totalCon2 = $r['Total'];
                    }
                    ?>


                    <?php
                    $result = $conn->query("SELECT count(*) as Total from category");

                    foreach ($result as $r) {
                            $totalCo2 = $r['Total'];
                    }
                    ?>
                    <?php

                    $result = $conn->query("SELECT count(*) as Total from student_ideas");

                    foreach ($result as $r) {
                            $totalI2 = $r['Total'];
                    }
                    ?>

                    <?php
                    $result = $conn->query("SELECT count(*) as Total from comment");

                    foreach ($result as $r) {
                            $totalC2 = $r['Total'];
                    }
                    ?>


                <div class="clear"></div>
                <div> <hr>   </div> <br> <br>

                <div class="col_one_fourth center" data-animate="bounceIn">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-building"></i>
                    <div class="counter counter-large" style="color: #3498db;"><span data-from="0" data-to="<?=$totalCon2?>""
                        data-refresh-interval="50"
                        data-speed="2000"></span>
                    </div>
                    <h5>Total Department</h5>
                </div>

                <div class="col_one_fourth center" data-animate="bounceIn" data-delay="200">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-tags"></i>
                    <div class="counter counter-large" style="color: #e74c3c;"><span data-from="0" data-to="<?= $totalCo2 ?>"
                                                                                     data-refresh-interval="50"
                                                                                     data-speed="2500"></span>
                    </div>
                    <h5>Total Category</h5>
                </div>

                <div class="col_one_fourth center" data-animate="bounceIn" data-delay="400">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-bulb"></i>
                    <div class="counter counter-large" style="color: #16a085;"><span data-from="0" data-to="<?= $totalI2 ?>"
                                                                                     data-refresh-interval="50"
                                                                                     data-speed="3500"></span>
                    </div>
                    <h5>Total Idea</h5>
                </div>

                <div class="col_one_fourth center col_last" data-animate="bounceIn" data-delay="600">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-comment"></i>
                    <div class="counter counter-large" style="color: #9b59b6;"><span data-from="0" data-to="<?=$totalC2?>" data-refresh-interval="30" data-speed="2700"></span></div>
                    <h5>Total Comment</h5>
                </div>

            </div>
            <div class="clear"></div>

        </div>
    </div>
</section>



        <?php
} else {
        include 'userLoginFirst.php';
} }

include 'footer.php';
?>



