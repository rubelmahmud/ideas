<?php
session_start();
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != 3){
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

                <h3>Sent Email to <span>Student</span></h3>

                <form class="clearfix" action="#" method="post" id="commentform">

                    <div class="col_full">
                        <label for="author">Subject</label>
                        <input type="text" name="author" id="author" value="" size="22" tabindex="1"
                               class="sm-form-control"/>
                    </div>

                    <div class="clear"></div>

                    <div class="col_full">
                        <label for="comment">Email Body</label>
                        <textarea name="comment" cols="58" rows="7" tabindex="4" class="sm-form-control"></textarea>
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
                    include 'userLoginFailed.php';
            }

            include 'footer.php';
            }?>
