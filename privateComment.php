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
                                            <h3>Choose an oprion for <span>Exception Report</span></h3>
                                            
                                            

                                        </div><!-- #respond end -->
            	                               <?php
                                               include 'dropException.php'; 
                                                ?>



            
                                        <div id="respond" class="clearfix">
                                            <div class="line"></div>
                                            <h4>Idea Without Comment</h4>

                                            <div class="table-responsive">
                                              <table class="table table-bordered nobottommargin">
                                                <thead>
                                                  <tr>
                                                    <th>No.</th>
                                                    <th>Comment</th>
                                                    <th>Idea</th>
                                                    <th>Date</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>1</td>
                                                    <td>go after exam</td>
                                                    <td>Study Tour</td>
                                                    <td>10/10/2018</td>
                                                    
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="line"></div>

                                        </div><!-- #respond end -->
        </div>

                    <?php
                    } else {
                            echo "<br> <br> <br> " . "<h1 style='color: #ac2925' align='center' >ERROR
                                                -_- </h1>" . "<br> <br>" . " 
                                  <h3 align='center'>Please " . "<a href='login.php'> Login</a>" . " First
                                  </h3>  " . "<br> <br> <br> ";
                    }

                    include 'footer.php';
                    ?>
