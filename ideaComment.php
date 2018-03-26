<!-- Add Comments
                  ============================================= -->
<div id="comments" class="clearfix">

        <h3 id="comments-title">Post Comment</h3>

        <?php
        if (isset($_SESSION['successCom'])) {
                ?>

                <div class="alert alert-success">
                        <i class="icon-thumbs-up"></i><strong>Your comment has been posted.</strong>
                </div>
                <?php
                unset($_SESSION['successCom']);

        }
        ?>

        <!-- Comment Form
============================================= -->
        <div id="respond" class="clearfix">
                <form class="clearfix" action="ideaSingleComSQL.php" method="post" id="commentform">
                        <div class="clear"></div>
                        <div class="col_full">
                                        <textarea name="comment_description" cols="58" rows="7" tabindex="4"
                                                  class="sm-form-control" required="required">
                                        </textarea>
                        </div>

                        <div class="form-group">
                                <?php if (isset($_SESSION['user_email'])) {

                                        //student
                                        if ($_SESSION["user_role"] == 0) {
                                                echo "<input type=\"checkbox\" name=\"comment_type\" value=\"1\"> Submit as anonymous";

                                                //staff
                                        } else if ($_SESSION["user_role"] == 1) {
                                                echo "";
                                        }
                                }?>

                        </div>
                        <div class="form-group">
                                <input type="hidden" name="ideas_number" value="<?php echo $row['ideas_number']; ?>"
                        </div>
        </div>

        <div class="clear"></div>

        <div class="col_full nobottommargin">
                <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit"
                        class="button button-3d nomargin">Comment
                </button>
        </div>
        </form>
</div><!-- #respond end -->



<!-- Disqus Comments
============================================= -->
</div><!-- #comments end -->

</div>