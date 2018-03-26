<?php
session_start();
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != 2){
        include 'userRestrict.php';
}else{

include 'header.php';


if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

if (isset($_GET["message"])) {
        echo '<script>alert("' . $_GET["message"] . '");</script>';
}
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
                <div class="line"></div>


            </div><!-- #respond end -->
                <?php
                include 'dropException.php';
                ?>


            <div class="line"></div>


        </div>

            <?php
            } else {
                    include 'userLoginFirst.php';
            }

            include 'footer.php';
            } ?>
