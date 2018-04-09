<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="SemiColonWeb"/>


    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="css/swiper.css" type="text/css"/>
    <link rel="stylesheet" href="css/dark.css" type="text/css"/>
    <link rel="stylesheet" href="css/font-icons.css" type="text/css"/>
    <link rel="stylesheet" href="css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css"/>

    <!--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />-->

    <script src="jquery-3.3.1.js" type="text/javascript"></script>

    <script src="script.js" type="text/javascript"></script>

    <script src="js/jquery.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/responsive.css" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>


    <!--	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
    <!--    <script type="text/javascript" src="pie.js"></script>-->


    <!-- Document Title
    ============================================= -->
    <title>DIA | IDEA Submission Portal</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <header id="header" class="transparent-header full-header" data-sticky-class="not-dark">

        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="index.php" class="standard-logo" data-dark-logo="images/logo-dark2.png"><img
                                src="images/logo2.png" alt="Canvas Logo"></a>
                                
                    <a href="index.php" class="retina-logo" data-dark-logo="images/logo-dark2.png"><img
                                src="images/logo2.png" alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu">

                    <ul><span></span>
                            <?php
                            if (isset($_SESSION['user_email'])) {


                                    //student
                                    if ($_SESSION["user_role"] == 0) {
                                            echo "<li><a href=\"index.php\"><div>Home</div></a></li>";
                                            echo "<li><a href=\"ideaListView.php\"><div>Browse Ideas</div></a></li>";
                                            echo "<li><a href=\"ideaSubmit.php\"><div>Submit Idea</div></a></li>";


                                            //super visor
                                    } else if ($_SESSION["user_role"] == 1) {
                                            echo "<li><a href=\"index.php\"><div>Home</div></a></li>";
                                            echo "<li><a href=\"ideaListView.php\"><div>Browse Idea</div></a></li>";

                                            //QAM
                                    } else if ($_SESSION["user_role"] == 2) {
                                            echo "<li><a href=\"index.php\"><div>Home</div></a></li>";
                                            echo "<li><a href=\"ideaListView.php\"><div>BROWSE IDEAS</div></a>
                                                        <ul>
                                                            <li><a href=\"ideaMostView.php\"><div>Most Viewed Ideas</div></a></li>
                                                            <li><a href=\"ideaMostPop.php\"><div>Most Popular Ideas</div></a></li>
                                                            <li><a href=\"ideaMostDis.php\"><div>Most Disliked Ideas</div></a></li>
                                                            
                                                        </ul>
                                                     </li>";
                                            echo "<li><a href=\"categoryView.php\"><div>Manage Category</div></a>
                                                        <ul>
                                                            <li><a href=\"categoryView.php\"><div>CATEGORY LIST</div></a></li>
                                                            <li><a href=\"categoryAdd.php\"><div>ADD CATEGORY</div></a></li>
                                                        </ul>
                                                     </li>";
                                            echo "<li><a href=\"#\"><div>Reports</div></a>
                                                        <ul>
                                                            <li><a href=\"staticBit.php\"><div>STATIC REPORT</div></a></li>
                                                            <li><a href=\"noCommentIdea.php\"><div>EXCEPTION REPORT</div></a></li>
                                                            <li><a href=\"userSummary.php\"><div>USER SUMMARY</div></a></li>
                                                        </ul>
                                                     </li>";
                                            echo "<li><a href=\"downloadZipFile.php\"><div>Download</div></a></li>";


                                            ////QAC
                                    } else if ($_SESSION["user_role"] == 3) {
                                            echo "<li><a href=\"index.php\"><div>Home</div></a></li>";
                                            echo "<li><a href=\"ideaListView.php\"><div>BROWSE IDEAS</div></a>
                                                        <ul>
                                                            <li><a href=\"ideaListViewQAC.php\"><div>Manage Ideas</div></a></li>
                                                            <li><a href=\"ideaMostViewQAC.php\"><div>Most Viewed Ideas</div></a></li>
                                                            <li><a href=\"ideaMostPopQAC.php\"><div>Most Popular Ideas</div></a></li>
                                                            <li><a href=\"ideaMostDisQAC.php\"><div>Most Disliked Ideas</div></a></li>
                                                        </ul>
                                                     </li>";
                                            echo "<li><a href=\"sentEmail.php\"><div>Send Email</div></a></li>";

                                            //Admin
                                    } else if ($_SESSION["user_role"] == 4) {
                                            echo "<li><a href=\"dashAdmin.php\"><div>Home</div></a></li>";
                                            echo "<li><a href=\"ideaListView.php\"><div>Browse Idea</div></a></li>";
                                            echo "<li><a href=\"userManage.php\"><div>Manage User</div></a>
                                                        <ul>
                                                            <li><a href=\"userSummary.php\"><div>USER SUMMARY</div></a></li>
                                                        </ul>
                                                     </li>";
                                    }

                                    // welcome user
                                    $userId = $_SESSION['user_id'];
                                    include "connect-db.php";
                                    $sql = "SELECT user_name, user_role_name
                                                FROM user, user_role
                                                WHERE user.user_role = user_role.user_role
                                                And user_id=$userId";

                                    $result = $conn->query($sql);
                                    foreach ($result as $row) {
                                            ?>


                                        <li><a href="userProfile.php">
                                                <div>My Profile</div>
                                            </a>
                                            <ul>
                                                <li><a href="userProfile.php">
                                                        <div style="text-transform: uppercase;"><br> Welcome <strong><?= $row['user_name'] ?> </strong>
                                                            <br> ( <?= $row['user_role_name'] ?> )
                                                        </div>
                                                    </a></li>
                                                <li><a href="logout.php?u=done">
                                                        <div style="color: #FF0000;">LOGOUT</div>
                                                    </a></li>
                                            </ul>

                                        </li>
                                    <?php }


                            } else {
                                    // Homepage
                                    echo "<li><a href=\"index.php\"><div>Home</div></a></li>";
                                    echo "<li><a href=\"login.php\"><div>Login</div></a>
                                                        <ul>
                                                            <li><a href=\"loginStaffPin.php\"><div>STAFF LOGIN</div></a></li>
                                                        </ul>
                                                     </li>";

                            } ?>
                    </ul>


                    <!-- Top Search
                    =============================================
                    <div id="top-search">
                        <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                        <form action="search.html" method="get">
                            <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                        </form>
                    </div>  #top-search end -->

                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header><!-- #header end -->
