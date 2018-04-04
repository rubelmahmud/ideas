<!--
 <!-- Sidebar
============================================= -->
<?php
include 'connect-db.php';
$query = "SELECT COUNT(thumbs_id) AS Pop, thumbsupdown.ideas_number, student_ideas.ideas_title, student_ideas.ideas_type, user.user_name 
FROM thumbsupdown, student_ideas, user
WHERE thumbsupdown.ideas_number=student_ideas.ideas_number
AND student_ideas.user_id = user.user_id
AND thumbsupdown.type='1'
GROUP BY thumbsupdown.ideas_number
ORDER BY Pop DESC LIMIT 5";

$result = mysqli_query($conn, $query);
?>


<div class="sidebar nobottommargin col_last clearfix">
        <div class="sidebar-widgets-wrap">


                <div class="widget clearfix">

                        <div class="tabs nobottommargin clearfix" id="sidebar-tabs">

                                <ul class="tab-nav clearfix">
                                        <li ><a href="#tabs-1"> <span style="color: blue; font-size: 13px;">POPULAR</a></li>
                                        <li><a href="#tabs-2"> <span style="color: indianred; font-size: 12px;">MOST VIEWED</a></li>
                                </ul>

                                <div class="tab-container">

                                        <div class="tab-content clearfix" id="tabs-1">
                                                <div id="popular-post-list-sidebar">

                                                        <?php
                                                        if(mysqli_num_rows($result) > 0)
                                                        {
                                                        while($row = mysqli_fetch_array($result))
                                                        {
                                                        ?>

                                                        <div class="spost clearfix">
                                                                <div class="entry-c">
                                                                        <div class="entry-title">
                                                                                <h4>
                                                                                  <a href="ideaSingle.php?ideas_number=<?php echo $row['ideas_number']; ?>"><?= $row['ideas_title'] ?></a>
                                                                                </h4>
                                                                        </div>
                                                                        <ul class="entry-meta">
                                                                                <li><i class="icon-user"></i>
                                                                                        <?php if ($row["ideas_type"] == 1){
                                                                                                echo "Anonymous";
                                                                                        } else {
                                                                                                echo $row["user_name"];
                                                                                        }?>
                                                                                </li>
                                                                        </ul>
                                                                        <ul class="entry-meta">
                                                                                <li><i class="icon-like"></i><?php echo $row["Pop"]; ?></li>
                                                                        </ul>
                                                                </div>
                                                        </div>

                                                        <?php } }
                                                        ?>

                                                </div>
                                        </div>

<?php
$queryV = "SELECT COUNT(page_id) as total, student_ideas.ideas_title, page_views.ideas_number, user.user_name, student_ideas.ideas_type
FROM page_views, student_ideas,user
WHERE page_views.ideas_number=student_ideas.ideas_number
AND student_ideas.user_id=user.user_id
GROUP BY student_ideas.ideas_number
ORDER BY total DESC limit 5";

$resultV = mysqli_query($conn, $queryV);
                                        ?>

                                        <div class="tab-content clearfix" id="tabs-2">
                                                <div id="recent-post-list-sidebar">
                                                        <?php
                                                        if(mysqli_num_rows($resultV) > 0)
                                                        {
                                                        while($row = mysqli_fetch_array($resultV))
                                                        {
                                                        ?>
                                                        <div class="spost clearfix">

                                                                <div class="entry-c">
                                                                        <div class="entry-title">
                                                                                <h4>
                                                                                        <a href="ideaSingle.php?ideas_number=<?php echo $row['ideas_number']; ?>"><?= $row['ideas_title'] ?></a>
                                                                                </h4>
                                                                        </div>
                                                                        <ul class="entry-meta">
                                                                                <li><i class="icon-user"></i>
                                                                                        <?php if ($row["ideas_type"] == 1){
                                                                                                echo "Anonymous";
                                                                                        } else {
                                                                                                echo $row["user_name"];
                                                                                        }?>
                                                                                </li>
                                                                        </ul>
                                                                        <ul class="entry-meta">
                                                                                <li><i class="icon-eye"></i><?php echo $row["total"]; ?></li>
                                                                        </ul>
                                                                </div>
                                                        </div>
                                                        <?php }
                                                        } ?>
                                                </div>
                                        </div>
                                        <div class="widget clearfix">

                                                <h4>CATEGORIES</h4>

                                          <?php
                                          $sql = "SELECT * FROM  category WHERE DATE (ideas_closer_date) > DATE(now())";

                                                $result = $conn->query($sql);
                                                ?>
                                                <div class="tagcloud">
                                                        <?php foreach ($result as $row) { ?>
                                                                <a href="#"><?= $row['category_name'] ?></a>
                                                        <?php } ?>
                                                </div>

                                        </div>
                                </div>
                        </div>

                </div>
        </div>


</div><!-- .sidebar end -->