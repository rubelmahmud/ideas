<!--<link rel="stylesheet" href="/css/clientprofile.css">-->

<?php
/**
 * Created by PhpStorm.
 * User: Rubel
 * Date: 3/27/2018
 * Time: 12:14 PM
 */

session_start();
include 'header.php';

if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {


//2. generate query to select all data from db table
        $userId = $_SESSION['user_id'];
        include "connect-db.php";
        $sql = "SELECT * FROM user, user_role, department
       WHERE user.user_role = user_role.user_role
       And user.department_id = department.department_id
       And user_id=$userId";

        $result = $conn->query($sql);

        foreach ($result as $row) { ?>
            <section id="content">
            <div class="content-wrap">

            <div class="container">
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">

            <div class="panel panel-info">
            <div class="panel-heading">
                <h2 class="panel-title" align="center">My Profile</h2>
            </div>
            <div class="panel-body">
            <div class="row">
            <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic"
                                                                src="<?= $row['user_photo'] ?>"
                                                                class="img-square img-responsive">
            </div>

            <div class=" col-md-9 col-lg-9 ">

            <table class="table table-user-information">
            <tbody>
            <tr>
                <td>Name:</td>
                <td style="text-transform: uppercase"><b><?= $row['user_name'] ?></b></td>
            </tr>
            <tr>
                <td>Role:</td>
                <td style="text-transform: uppercase"><b><?= $row['user_role_name'] ?></b></td>
            </tr>
            <tr>
                <td>Department:</td>
                <td style="text-transform: uppercase"><b><?= $row['department_name'] ?></b></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td style="text-transform: uppercase"><b><?= $row['user_email'] ?></b></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><b><?= $row['user_phone'] ?></b></td>
            </tr>

            <tr>
            <tr>
                <td>Address:</td>
                <td style="text-transform: uppercase"><b><?= $row['user_address'] ?></b></td>
            </tr>
        <?php } ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="clear"></div>
<!-- my idea list (for student only)-->
        <?php
        $query = "SELECT * FROM student_ideas, user, category
WHERE student_ideas.user_id = user.user_id 
AND student_ideas.category_id = category.category_id
AND user.user_id=$userId
ORDER BY student_ideas.posted_time DESC ";
        $result = mysqli_query($conn, $query);

        if (isset($_SESSION['user_email'])) {
// student
                if ($_SESSION["user_role"] == 0) {
                        include 'userIdeaList.php';

                        //staff
                } else if ($_SESSION["user_role"] == 1) {
                        echo '';

                }
        }
        ?>

        <?php
        if (isset($_SESSION['user_email'])) {

                if ($_SESSION["user_role"] == 0) {
                        include "userConStd.php";;

                } else if ($_SESSION["user_role"] != 0 ) {
                        include "userConStaff.php";

                }
        } ?>


        <?php
        if (isset($_SESSION['user_email'])) {

                if ($_SESSION["user_role"] == 0) {
                        echo "
                    <div class=\"promo promo-light bottommargin\">
                    <h3>Call us today at <span>+91.22.57412541</span> or Email us at <span>support@canvas.com</span>
                    </h3>
                    <span>We strive to provide Our Customers with Top Notch Support to make their Theme Experience Wonderful</span>
                    <a href=\"ideaSubmit.php\" class=\"button button-xlarge button-rounded\">Submit Idea</a>
                </div>
                        
                               ";

                        //staff
                } else if ($_SESSION["user_role"] != 0) {
                        echo "
                <div class=\"promo promo-light bottommargin\">
                    <h3>Call us today at <span>+91.22.57412541</span> or Email us at <span>support@canvas.com</span>
                    </h3>
                    <span>We strive to provide Our Customers with Top Notch Support to make their Theme Experience Wonderful</span>
                    <a href=\"ideaListView.php\" class=\"button button-xlarge button-rounded\">Browse Ideas</a>
                </div>
                        
                        ";
                }
        } ?>

    </div>



    </div>

    </section>


<?php } else {
        include 'userLoginFirst.php';
}

include 'footer.php';
?>



