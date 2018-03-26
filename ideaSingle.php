<?php
session_start();
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] != 0 && $_SESSION['user_role'] != 1 ){
        include 'userRestrict.php';
} else {
include 'header.php';

if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {


        //1. connect database
        include 'connect-db.php';

//2. generate query to select all data from db table

        $inum = $_GET['ideas_number'];


        $sql = "SELECT * FROM student_ideas, user, category
                WHERE student_ideas.user_id = user.user_id
                AND student_ideas.category_id = category.category_id
                AND ideas_number=$inum";


//3. execute query to get result
        $result = $conn->query($sql);
//4. show data in html template
        ?>

    <!-- Page Title
       ============================================= -->
    <section id="page-title">
            <?php foreach ($result as $row) { ?>
        <div class="container clearfix">
            <h3><a href="ideaSingle.php?ideas_number=<?php echo $row['ideas_number']; ?>"><?= $row['ideas_title'] ?></a>
            </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="ideaListView.php">Idea List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Idea Details</li>
                    </ol>
        </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content">

        <div class="content-wrap">

        <div class="container clearfix">

            <!-- Post Content
            ============================================= -->
            <div class="postcontent nobottommargin clearfix">

                <div class="single-post nobottommargin">

                    <!-- Single Post
                    ============================================= -->
                    <div class="entry clearfix">

                        <!-- Entry Title
                        ============================================= -->

                        <div class="entry-title">
                            <h2>
                                <a href="ideaSingle.php?ideas_number=<?php echo $row['ideas_number']; ?>"><?= $row['ideas_title'] ?></a>
                            </h2>
                        </div><!-- .entry-title end -->

                        <!-- Entry Meta
                        ============================================= -->
                        <ul class="entry-meta clearfix">
                            <li><?php echo date("d F, Y", strtotime($row["posted_time"])); ?></li>

                                <?php if ($row["ideas_type"] == 1) { ?>
                                    <li><i class="icon-user"><?php echo " Anonymous"; ?></i></li>
                                <?php } else { ?>
                                    <li><i class="icon-user"> <?= $row['user_name'] ?></i></li>
                                <?php } ?>

                            <li><i class="icon-tag"></i><?= $row['category_name'] ?></li>

                        </ul><!-- .entry-meta end -->


                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content notopmargin">

                            <ul>
                                <li>Idea Taking Closer Date: <b><?= date("d F, Y", strtotime($row["ideas_closer_date"])); ?></b></li>
                                <li>Idea Final Closer Date:<b> <?= date("d F, Y", strtotime($row["ideas_final_closer_date"])); ?></b></li>
                            </ul>

                            <p><?= $row['ideas_description'] ?></p>


                            <!-- Post Single - Content End -->
                                <?php
                                // Checking user status
                                $status_query = "SELECT count(*) as cntStatus,type FROM thumbsupdown WHERE user_id=".$_SESSION['user_id']." and ideas_number=".$inum;
                                $status_result = mysqli_query($conn,$status_query);
                                $status_row = mysqli_fetch_array($status_result);
                                $count_status = $status_row['cntStatus'];
                                if($count_status > 0){
                                        $type = $status_row['type'];
                                }

                                // Count post total likes and unlikes
                                $like_query = "SELECT COUNT(*) AS cntLikes FROM thumbsupdown WHERE type=1 and ideas_number=".$inum;
                                $like_result = mysqli_query($conn,$like_query);
                                $like_row = mysqli_fetch_array($like_result);
                                $total_likes = $like_row['cntLikes'];

                                $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM thumbsupdown WHERE type=0 and ideas_number=".$inum;
                                $unlike_result = mysqli_query($conn,$unlike_query);
                                $unlike_row = mysqli_fetch_array($unlike_result);
                                $total_unlikes = $unlike_row['cntUnlikes'];

                                ?>
                       <div class="post">
                             <div class="post-action">

                                <input type="button" value="Like" id="like_<?php echo $inum; ?>" class="like" style="<?php if($type == 1){ echo "color: #ffa449;"; } ?>" />&nbsp;(<span id="likes_<?php echo $inum; ?>"><?php echo $total_likes; ?></span>)&nbsp;

                                <input type="button" value="Unlike" id="unlike_<?php echo $inum; ?>" class="unlike" style="<?php if($type == 0){ echo "color: #ffa449;"; } ?>" />&nbsp;(<span id="unlikes_<?php echo $inum; ?>"><?php echo $total_unlikes; ?></span>)

                            </div>
                       </div>

        <?php } ?>


                            <div class="clear"></div>

                            <!-- Add Comments
                    ============================================= -->
                            <div id="comments" class="clearfix">

                                <h3 id="comments-title">Post Comment</h3>

                                    <?php
                                    if (isset($_SESSION['successCom'])) {
                                            ?>

                                        <div class="alert alert-success">
                                            <i class="icon-thumbs-up"></i><strong>Your comment has been posted.</strong>
                                        </div>
                                            <?php
                                            unset($_SESSION['successCom']);

                                    }
                                    ?>

                                <!-- Comment Form
                        ============================================= -->
                                <div id="respond" class="clearfix">
                                    <form class="clearfix" action="ideaSingleComSQL.php" method="post" id="commentform">
                                        <div class="clear"></div>
                                        <div class="col_full">
                                        <textarea name="comment_description" cols="58" rows="7" tabindex="4"
                                                  class="sm-form-control" required="required">
                                        </textarea>
                                        </div>

                                        <div class="form-group">
                              <?php if (isset($_SESSION['user_email'])) {

                                        //student
                                        if ($_SESSION["user_role"] == 0) {
                                                echo "<input type=\"checkbox\" name=\"comment_type\" value=\"1\"> Submit as anonymous";

                                                //staff
                                        } else if ($_SESSION["user_role"] == 1) {
                                                echo "";
                                                }
                                }?>

                                        </div>
                                <div class="form-group">
                                    <input type="hidden" name="ideas_number" value="<?php echo $row['ideas_number']; ?>"
                                </div>
                            </div>

                            <div class="clear"></div>

                            <div class="col_full nobottommargin">
                                <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit"
                                        class="button button-3d nomargin">Comment
                                </button>
                            </div>
                            </form>
                        </div><!-- #respond end -->
                        <!-- Disqus Comments
                        ============================================= -->
                    </div><!-- #comments end -->

                </div>

                <!-- Post Single - Share
                ============================================= -->

            </div>
        </div><!-- .entry end -->

        <!-- Post Author Info
        ============================================= -->
                <?php
                $sqlCom = "SELECT * FROM comment WHERE ideas_number=$inum
                    ORDER BY comment_time DESC";

                //3. execute query to get result
                $resultCom = $conn->query($sqlCom);
                //4. show data in html template
                ?>

        <div class="card">
                <?php foreach ($resultCom as $rowCom) { ?>
                        <?php
                        $id = $rowCom["user_id"];
                        $sqlCom1 = "SELECT * FROM user WHERE user_id = $id";

                        $resultCom2 = $conn->query($sqlCom1); ?>



                        <?php foreach ($resultCom2 as $row) {?>

                               <?php if ($row['user_role'] == 0 && $_SESSION['user_role'] == 0)
                               { ?>
                                    <!-- Showing Student Comment Only  -->
                            <div class="card-header">
                                    <div class="name" align="left">
                                        <i class="icon-user" style="color: #31C3A6;"> Commented by</i>
                                        <strong>
                                                    <?php if ($rowCom["comment_type"] == 1) {
                                                            echo "Anonymous";
                                                    } else {

                                                            $u_name = $rowCom['user_id'];
                                                            $sqlCn = "SELECT user_name FROM user WHERE user_id = $u_name";
                                                            $resultCn = $conn->query($sqlCn);
                                                            foreach ($resultCn as $rowCn) {
                                                                    echo $rowCn['user_name'];
                                                            }
                                                    } ?>
                                        </strong>
                                    </div>
                                    <div class="date" align="right">
                                        <h6>
                                            <i class="icon-calendar2"></i> <?= date("h:i A ~ d F, Y", strtotime($rowCom["comment_time"])); ?>
                                        </h6>
                                    </div>
                                    </div>
                                    <div class="card-body">
                                    <div class="author-image">
                                            <?php if ($rowCom["comment_type"] == 1) {
                                                    echo "<img src=\"images/author/anony.png\" alt=\"Anony\" class=\"rounded-circle\">";
                                            } else {
                                                    echo "<img src=\"images/author/rsz_ava.png\" alt=\"Avatar\" class=\"rounded-circle\">"; ?>

                                            <?php } ?>
                                    </div>
                                    <br>
                                        <?php echo $rowCom['comment_description']; ?>

                                    </div>

                                <?php } else if ($_SESSION['user_role'] != 0) { ?>
                                    <!-- Showing Student & Staff Comment  -->
                              <div class="card-header">
                                    <div class="name" align="left">
                                        <i class="icon-user" style="color: #31C3A6"> Commented by</i>
                                        <strong>
                                                    <?php if ($rowCom["comment_type"] == 1) {
                                                            echo "Anonymous" ;
                                                    } else {

                                                            $u_name = $rowCom['user_id'];
                                                            $sqlCn = "SELECT user_name FROM user WHERE user_id = $u_name";
                                                            $resultCn = $conn->query($sqlCn);
                                                            foreach ($resultCn as $rowCn) {
                                                                    echo $rowCn['user_name'];
                                                            }
                                                    } ?>

                                        </strong>
                                    </div>
                                    <div class="date" align="right">
                                        <h6>
                                            <i class="icon-calendar2"></i> <?= date("h:i A ~ d F, Y", strtotime($rowCom["comment_time"])); ?>
                                        </h6>
                                    </div>
                                    </div>


                                    <div class="card-body">
                                    <div class="author-image">
                                            <?php if ($rowCom["comment_type"] == 1) {
                                                    echo "<img src=\"images/author/anony.png\" alt=\"Anony\" class=\"rounded-circle\">";
                                            } else {
                                                    echo "<img src=\"images/author/rsz_ava.png\" alt=\"Avatar\" class=\"rounded-circle\">"; ?>
                                            <?php } ?>

                                    </div>
                                    <br>
                                        <?php echo $rowCom['comment_description']; ?>
                       </div>
                      <?php }
                        }
                         } ?>


        </div><!-- Post Single - Author End -->
<!--      --><?php //} ?>


    <div id="disqus_thread"></div>


    </div><!-- .postcontent end -->


    </section><!-- #content end -->


        <?php
} else {
        include 'userLoginFirst.php';
}

include 'footer.php';
} ?>
