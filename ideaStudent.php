<?php
session_start();
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != 0){
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

                <h3>Recent <span>Comment</span></h3>

                <div class="line"></div>

                <h4>Category table</h4>

                <div class="table-responsive">
                    <table class="table table-bordered nobottommargin">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Idea</th>
                            <th>number of comment</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>this is idea</td>
                            <td>20</td>
                        </tr>
                        </tbody>
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
