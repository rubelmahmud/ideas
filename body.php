<!-- Content
		============================================= -->

<?php  include 'connect-db.php';
?>

<section id="content">
    <hr>
    <div class="content-wrap">

        <div class="container clearfix">
            <div class="col_full">
                <div class="heading-block center nobottomborder">
                    <h2 style="color: #800000;"> CONTRIBUTION STATISTICS</h2>
                   
                </div>

                    <?php
                    $result = $conn->query("SELECT(
    (SELECT COUNT(ideas_number) FROM student_ideas) + (SELECT COUNT(comment_id) FROM comment)) AS Total");

                    foreach ($result as $r) {
                            $totalCo = $r['Total'];
                    }
                    ?>
                    <?php

                    $result = $conn->query("SELECT count(*) as Total from student_ideas");

                    foreach ($result as $r) {
                            $totalI = $r['Total'];
                    }
                    ?>

                    <?php
                    $result = $conn->query("SELECT count(*) as Total from comment");

                    foreach ($result as $r) {
                            $totalC = $r['Total'];
                    }
                    ?>
                    <?php
                    $result = $conn->query("SELECT count(*) as Total from user where user_role='0'");

                    foreach ($result as $r) {
                            $totalCon = $r['Total'];
                    }
                    ?>

                <div class="col_one_fourth center" data-animate="bounceIn">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-users"></i>
                    <div class="counter counter-large" style="color: #3498db;"><span data-from="0" data-to="<?=$totalCon?>""
                                                                                     data-refresh-interval="50"
                                                                                     data-speed="2000"></span>
                    </div>
                    <h5>Total Contributors</h5>
                </div>

                <div class="col_one_fourth center" data-animate="bounceIn" data-delay="200">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-cloud"></i>
                    <div class="counter counter-large" style="color: #e74c3c;"><span data-from="0" data-to="<?= $totalCo ?>"
                                                                                     data-refresh-interval="50"
                                                                                     data-speed="2500"></span>
                    </div>
                    <h5>Total Contribution</h5>
                </div>

                <div class="col_one_fourth center" data-animate="bounceIn" data-delay="400">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-bulb"></i>
                    <div class="counter counter-large" style="color: #16a085;"><span data-from="0" data-to="<?= $totalI ?>"
                                                                                     data-refresh-interval="50"
                                                                                     data-speed="3500"></span>
                    </div>
                    <h5>Total Ideas</h5>
                </div>

                <div class="col_one_fourth center col_last" data-animate="bounceIn" data-delay="600">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-comment"></i>
                    <div class="counter counter-large" style="color: #9b59b6;"><span data-from="0" data-to="<?=$totalC?>" data-refresh-interval="30" data-speed="2700"></span></div>
                    <h5>Total Comments</h5>
                </div>
            </div>
            <div class="clear"></div>

                <?php

                if (isset($_SESSION['user_email'])) {

                        if ($_SESSION["user_role"] == 0) {
                                echo "
                    <div class=\"promo promo-light bottommargin\">
                    <h3> Email us at <span> info@ideaportal.rubelmahmud.me</span>
                    </h3>
                    <a href=\"ideaSubmit.php\" class=\"button button-xlarge button-rounded\">Submit Idea</a>
                </div>
                        
                               ";

                                //staff
                        } else if ($_SESSION["user_role"] == 1) {
                                echo "
                <div class=\"promo promo-light bottommargin\">
                    <h3>Email us at <span> info@ideaportal.rubelmahmud.me</span>
                    </h3>
                    <a href=\"ideaListView.php\" class=\"button button-xlarge button-rounded\">Browse Ideas</a>
                </div>
                        
                        ";
                        }
                } else {
                        echo "
                    <div class=\"promo promo-light bottommargin\">
                    <h3> LOGIN TO EXPLORE <span>IDEAS</span> & DO <span>COMMENTS</span>
                    </h3>
					<p>Email us at : <span> info@ideaportal.rubelmahmud.me</span></p>
                    
                    <a href=\"login.php\" class=\"button button-xlarge button-rounded\">Login</a>
                </div>
                    
                    ";
                }

                ?>


        </div>
    </div>
</section>






