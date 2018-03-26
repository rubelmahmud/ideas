<?php
session_start();
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != 4){
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


            <h4>Idea counter table</h4>

            <div class="table-responsive">
                <table class="table table-bordered nobottommargin">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Topic Title</th>
                        <th>Department</th>
                        <th>Number Of Idea Submit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Study Tour</td>
                        <td>science</td>
                        <td><a href="">20</a></td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>2</td>
                        <td>Liberary</td>
                        <td>Arts</td>
                        <td><a href="">30</a></td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>3</td>
                        <td>Class Room</td>
                        <td>Commerce</td>
                        <td><a href="">40</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="line"></div>

        </div><!-- #respond end -->
    </div>

        <?php
        } else {
                include 'userLoginFailed.php';
        }

        include 'footer.php';
        }?>


