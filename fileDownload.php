<?php
session_start();
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != 2){
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

        <div class="container clearfix">
            <div class="row clearfix">

                <div class="col-xl-5">
                    <div class="heading-block topmargin">
                        <h1> All File 33</h1>

                    </div>

                    <div class="col_full nobottommargin">
                        <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit"
                                class="button button-3d nomargin">Download All
                        </button>
                    </div>
                    <div class="line"></div>
                    <a href="">document.pdf</a><br>
                    <a href="">image.jpg</a><br>
                    <a href="">word.docx</a><br>
                    <div class="line"></div>
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

            include 'footer.php';
            }?>
