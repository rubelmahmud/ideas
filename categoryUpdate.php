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
        <?php
        $cat_id = $_GET['category_id'];
        include 'connect-db.php';

        $sql = "SELECT * FROM category WHERE category_id=$cat_id";
        $record = $conn->query($sql);

        foreach($record as $row){
                $category_name  	        = $row['category_name'];
                $category_desc 	            = $row['category_desc'];
                $ideas_closer_date      	= $row['ideas_closer_date'];
                $ideas_final_closer_date 	= $row['ideas_final_closer_date'];

        }

        ?>


<section id="content">

    <div class="content-wrap">

        <!-- Comment Form
============================================= -->
        <div class="container">


            <div id="respond" class="clearfix">

                <h3>Update a <span>Category</span></h3>



                <form class="clearfix" action="categoryUpdateSQL.php" method="POST" id="commentform">

                    <div class="form-group">
                        <label for="author">CATEGORY</label>
                        <input type="hidden" value="<?php if (isset($cat_id)){echo $cat_id; }?>" name="category_id">

                        <input type="text" name="category_name" size="22" tabindex="1"
                               value="<?php if(isset($category_name)) {echo $category_name ;} ?>" class="sm-form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="comment">CATEGORY DESCRIPTION</label>
                        <textarea name="category_desc" cols="58" rows="7" tabindex="4"
                                  class="sm-form-control" >
                                <?php if(isset($category_desc)) {echo $category_desc ;} ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="comment">Idea taking closer date</label>
                        <input type="Date" name="ideas_closer_date"  size="22" tabindex="1"
                               value="<?php if(isset($ideas_closer_date)) {echo $ideas_closer_date ;} ?>" class="sm-form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="comment">Idea final closer date</label>
                        <input type="Date" name="ideas_final_closer_date"  size="22" tabindex="1"
                               value="<?php if(isset($ideas_final_closer_date)) {echo $ideas_final_closer_date ;} ?>"  class="sm-form-control"/>
                    </div>

                    <div class="clear"></div>

                    <div class="form-group nobottommargin">
                        <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit"
                                class="button button-3d nomargin">Update
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


