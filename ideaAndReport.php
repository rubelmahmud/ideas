<?php 
session_start();
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

                                                <h3>Choose department to see the report</h3>
                                                

                                                <form class="clearfix" action="#" method="post" id="commentform">

															<div class="dropdown col_full">
																	  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																	    choose department
																	  </button>
																	  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																	    <a class="dropdown-item" href="#">Science</a>
																	    <a class="dropdown-item" href="#">Arts</a>
																	    <a class="dropdown-item" href="#">Commerce</a>
																	  </div>
																	</div>
                                                                    <div class="clear"></div>
                                                                    <div class="line"></div>
                                                                <!--report table-->
                                                                <div style="margin-bottom: 10px;" class="float-left">
                                                                    <h3>department <span>Name</span></h3>
                                                                </div>
                                                                <div style="margin-bottom: 10px;" class="float-right">
                                                                    <button>print</button>
                                                                </div>
                                                                <div class="table-responsive">
                                                                  <table class="table table-bordered nobottommargin">
                                                                    <thead>
                                                                      <tr>
                                                                        <th>No.</th>
                                                                        <th>Category Name</th>
                                                                        <th>Using Status</th>
                                                                        <th>Remove</th>
                                                                      </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                      <tr>
                                                                        <td>1</td>
                                                                        <td>Study Tour</td>
                                                                        <td>Yes</td>
                                                                        <td><a href="">Delete</a></td>
                                                                      </tr>
                                                                    </tbody>
                                                                  </table>
                                                                </div>
                    
                    
                                                                <div class="clear"></div>
                                                                <div class="line"></div>
                                                    </form>

                                        </div><!-- #respond end -->
</div>

                    <?php
                    } else {
                            include 'userLoginFailed.php';
                    }

                    include 'footer.php';
                    ?>
