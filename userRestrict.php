<?php

include 'header.php';


if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

?>

<!-- Content
		============================================= -->
<section id="content">
        <div class="content-wrap">
                <div class="container clearfix">
                        <div class="row clearfix">
                                <div class="col-xl-5">
                                        <div class="heading-block topmargin">
                                            <h1 align="center"><font color="#a52a2a"><b>Sorry</b>!</font> <br>You are not eligible to view this page</h1>
                                        </div>
                                        <p class="lead">Please go back or use another option from menu bar.</p>
                                </div>
                                <div class="col-xl-7">
                                        <div style="position: relative; margin-bottom: -60px;" class="ohidden" data-height-xl="426"
                                             data-height-lg="567" data-height-md="470" data-height-md="287" data-height-xs="183">
                                                <img src="images/error.jpeg" style="position: absolute; top: 0; left: 0;" height="300"
                                                     data-animate="fadeInUp" data-delay="100" alt="Chrome">
                                                <img src="images/error.jpeg" style="position: absolute; top: 0; left: 0;" height="300"
                                                     data-animate="fadeInUp" data-delay="400" alt="iPad">
                                        </div>
                                </div>
                        </div>
                </div>

                <?php
                } else {
                        echo "<br> <br> <br> " . "<h1 style='color: #ac2925' align='center' >ERROR
                                                -_- </h1>" . "<br> <br>" . " 
                                  <h3 align='center'>Please " . "<a href='login.php'> Login</a>" . " First
                                  </h3>  " . "<br> <br> <br> ";
                }

include 'footer.php'; ?>
