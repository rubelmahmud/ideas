
<?php
session_start();
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


        // "SELECT * FROM student_ideas, user, category
        // WHERE student_ideas.user_id = user.user_id AND
        //   student_ideas.category_id = category.category_id

//3. execute query to get result
        $resultSet = $conn->query($sql);
//4. show data in html template
        ?>

    <!-- Page Title
       ============================================= -->
    <section id="page-title">
        <?php foreach ($resultSet as $row) { ?>
        <div class="container clearfix">
            <h3><a href="ideaSingle.php?ideas_number=<?php echo $row['ideas_number']; ?>"><?= $row['ideas_title'] ?></a>
            </h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="ideaListView.php">Idea</a></li>
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
                            <li><i class="fas fa-thumbs-down"></i>9 Like</li>
                            <li><i class="fas fa-thumbs-down"></i>5 Unlike</li>
                        </ul><!-- .entry-meta end -->


                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content notopmargin">

                            <ul>
                                <li><b>Idea Taking Closer Date:</b> <?= $row['ideas_closer_date'] ?></li>
                                <li><b>Final Closer Date:</b> <?= $row['ideas_final_closer_date'] ?></li>
                            </ul>

                            <p><?= $row['ideas_description'] ?></p>


                            <!-- Post Single - Content End -->

                            <button type="button" class="btn btn-success">
                                <i class="fas fa-thumbs-up"></i> 9 Like
                            </button>

                            <button type="button" class="btn btn-danger">
                                <i class="fas fa-thumbs-down"></i> 5 Unlike
                            </button>


                            <div class="clear"></div>

                            <!-- Add Comments
                    ============================================= -->
                            <div id="comments" class="clearfix">

                                <h3 id="comments-title">Post Comment</h3>

                                    <?php
                                    if (isset($_SESSION['successCom'])) {
                                            ?>

                                        <div class="alert alert-success">
                                            <i class="icon-thumbs-up"></i><strong>Well done!</strong>
                                            Your comment posted.
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
                     <textarea name="comment_description"
                               cols="58" rows="7" tabindex="4"
                               class="sm-form-control"
                               required="required">
                     </textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="comment_type" value="1"> Submit as anonymous
                                        </
                                        >
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="ideas_number" value="<?php echo $row['ideas_number']; ?>"
                                </
                                >
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
                    <div class="card-header">
                        <div class="name" align="left">
                            Commented by <strong>
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
                                <i class="icon-calendar2"></i> <?= date("d F, Y", strtotime($rowCom["comment_time"])); ?>
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

                            <?php
                            $id = $rowCom["user_id"];
                            $sqlCom1 = "SELECT * FROM user WHERE user_id = $id";

                            $resultCom2 = $conn->query($sqlCom1);

                            foreach ($resultCom2 as $row){
                                    // echo "User Role: ". $row['user_role'];
                                    if($row['user_role'] == 0  && $_SESSION['user_role'] == 0){
                                            echo $rowCom['comment_description'];

                                    }else if($_SESSION['user_role'] != 0){
                                            echo $rowCom['comment_description'];
                                    }
                            }
                            ?>
                        <!--                            --><?//= $rowCom['comment_description'] ?>

                    </div>
                <?php } ?>
        </div><!-- Post Single - Author End -->
        <?php } ?>


    <div id="disqus_thread"></div>


    </div><!-- .postcontent end -->
    </div>

    </div>

    </section><!-- #content end -->


        <?php
} else {
        include 'userLoginFailed.php';
}

include 'footer.php';
?>

