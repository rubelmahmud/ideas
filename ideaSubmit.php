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
        <span>Please submit your creative ideas to improve the campus</span>
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
                <h3 align= "Center">SUBMIT YOUR <span>IDEA</span></h3>

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
                        <label for="category" > <span style="color: #008B8B; font-size: 20px;">CHOOSE CATEGORY</Span></label>
						
                            <?php include 'connect-db.php';

                            $sql = "SELECT * FROM  category WHERE DATE (ideas_closer_date) > DATE(now())";

                            $result = $conn->query($sql);
                           //  var_dump($result);
                            ?>

                        <select class="form-control" name="category_id" id="category">
                                <?php foreach ($result as $row) { ?>
                                    <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                                <?php } ?>
                        </select>
                    </div>
					<br>
                    <div class="form-group">
                        <label for="ideas_title"> <span style="color: #008B8B; font-size: 20px;">IDEA TITLE </Span></label>
                        <input type="text" name="ideas_title" id="ideas_title" size="22" tabindex="1"
                               class="sm-form-control" required="required"/>
                    </div>
					<br>
                    <div class="form-group">
                        <label for="ideas_description"> <span style="color: #008B8B; font-size: 20px;">IDEA DESCRIPTION</span></label>
                        <textarea name="ideas_description" cols="58" rows="7" tabindex="4"
                                  id="ideas_description" class="sm-form-control" required="required"></textarea>
                    </div>
					<br>

                    <div class="form-group">
                        <input type="file" style="color: #FFA700;" name="file[]" multiple="multiple">
                        </>
                    </div>
					<br>
                    <div class="form-group">
                        <input type="checkbox" name="ideas_type" value="1"><span style="color: #A57164	; font-size: 17px;">  Submit as anonymous </>
                    </div>
					<br>
                    <div class="form-group">
                        <input type="checkbox" required="required"><span style="color: #A57164	; font-size: 16px;">  Agree with terms and condition  <a href="#" data-toggle="modal" data-target="#myModal">  read details</a> 
                    </div>





                                  <!-- The Modal -->
                                  <div class="modal fade" id="myModal">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                      
                                        <!-- Modal Header -->
                                        <div class="modal-header" style="background-color: #1bbc9b">
                                          <h4 class="modal-title" style="color: white;">Terms and Conditions</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                          These Agreements constitute all the terms and conditions agreed upon between you and Idea Portal and supersede any prior agreements in relation to the subject matter of these Agreements, whether written or oral. Any additional or different terms or conditions in relation to the subject matter of the Agreements in any written or oral communication from you to Idea Portal are void. You represent that you have not accepted the Agreements in reliance on any oral or written representations made by Idea Portal that are not contained in the Agreements.


                                        </div>
                                        
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                                  
                                </div>







                    <div class="clear"></div>
					</br>
                    <div class="form-group nobottommargin">
                        <button name="submit" type="submit" id="submit" tabindex="5" value=" Submit "
                                class="button button-3d nomargin">SUBMIT
                        </button>
                    </div>
                </form>
    </div>
</section>
                <div class="line"></div>


            <?php
            } else {
                    include 'userLoginFirst.php';
            }

            include 'footer.php';
            }  ?>

