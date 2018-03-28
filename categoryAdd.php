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
<section id="content">

    <div class="content-wrap">

        <!-- Comment Form
============================================= -->
        <div class="container">


            <div id="respond" class="clearfix">

                <h3>Add a <span>Category</span></h3>

                    <?php
                    if(isset($_SESSION['successCat'])){
                            ?>

                        <div class="alert alert-success">
                            <i class="icon-thumbs-up"></i><strong>Category Added successfully</strong>
                        </div>
                            <?php
                            unset($_SESSION['successCat']);

                    }
                    ?>

                <form class="clearfix" action="categoryAddSQL.php" method="POST" id="commentform">

                    <div class="form-group">
                        <label for="author">CATEGORY</label>
                        <input type="text" name="category_name" size="22" tabindex="1"
                               class="sm-form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="comment">CATEGORY DESCRIPTION</label>
                        <textarea name="category_desc" cols="58" rows="7" tabindex="4"
                                  class="sm-form-control" required="required">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="comment">Idea taking closer date</label>
                        <input type="Date" name="ideas_closer_date" value="" size="22" tabindex="1"
                               class="sm-form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="comment">Idea final closer date</label>
                        <input type="Date" name="ideas_final_closer_date" value="" size="22" tabindex="1"
                               class="sm-form-control"/>
                    </div>

                    <div class="clear"></div>

                    <div class="form-group nobottommargin">
                        <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit"
                                class="button button-3d nomargin">ADD
                        </button>
                    </div>
                </form>


                <div class="line"></div>


            </div><!-- #respond end -->
        </div>

            <?php
            } else {
                    include 'userLoginFirst.php';
            }

            include 'footer.php';
            }  ?>