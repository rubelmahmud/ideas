<?php
session_start();
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != 0){
        include 'userRestrict.php';
}else{

include 'header.php';


if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {


?>

<!-- Page Title
              ============================================= -->
<section id="page-title" xmlns="http://www.w3.org/1999/html">

    <div class="container clearfix">

        <h1>Submit Idea</h1>
        <span>Please submit your creative ideas to improve the campus.</span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Submit Idea</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Content
		============================================= -->
<section id="content">

    <div class="content-wrap">

        <!-- Comment Form
============================================= -->
        <div class="container">
            <div id="respond" class="clearfix">
                <h3>Submit an <span>IDEA</span></h3>

                <?php
                if(isset($_SESSION['successIdea'])){
                    ?>

                    <div class="alert alert-success">
                        <i class="icon-thumbs-up"></i><strong>Your idea submitted successfully</strong>
                    </div>
                        <?php
                        unset($_SESSION['successIdea']);

                }
                ?>
                <form class="clearfix" action="ideaSubSQL.php" method="POST" id="idea_submit" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="ideas_title">IDEA TITLE</label>
                        <input type="text" name="ideas_title" id="ideas_title" size="22" tabindex="1"
                               class="sm-form-control" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="ideas_description">IDEA DESCRIPTION</label>
                        <textarea name="ideas_description" cols="58" rows="7" tabindex="4"
                                  id="ideas_description" class="sm-form-control" required="required">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">CHOOSE CATEGORY</label>
                            <?php include 'connect-db.php';
                            $sql = "SELECT * FROM  category";
                            $result = $conn->query($sql); ?>
                        <select class="form-control" name="category_id" id="category">
                                <?php foreach ($result as $row) { ?>
                                    <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file"  name="fileToUpload" multiple="multiple"> </>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="ideas_type" value="1">  Submit as anonymous </>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" required="required">  Agree with terms and condition <a href="">read details</a>
                    </div>

                    <div class="clear"></div>

                    <div class="form-group nobottommargin">
                        <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit"
                                class="button button-3d nomargin">SUBMIT
                        </button>
                    </div>
                </form>
    </div>
</section>
                <div class="line"></div>


            <?php
            } else {
                    include 'userLoginFailed.php';
            }

            include 'footer.php';
            }  ?>
