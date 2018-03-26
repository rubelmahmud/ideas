<?php
session_start();
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != 3){
        include 'userRestrict.php';
}else{

        include 'header.php';


        if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

                ?>
<!-- Page Title
              ============================================= -->
<section id="page-title">

        <div class="container clearfix">

                <h1>Ideas</h1>
                <span>Check ideas</span>
                <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Idea</li>
                </ol>
        </div>

</section><!-- #page-title end -->
<!-- Content
           ============================================= -->
<?php
include "connect-db.php";

// $inum = $_GET['ideas_number'];

$sql = "SELECT * FROM student_ideas, user, category
WHERE student_ideas.user_id = user.user_id AND
student_ideas.category_id = category.category_id
ORDER BY student_ideas.posted_time DESC ";



$result = mysqli_query($conn, $sql);
?>

<section id="content">
        <div class="content-wrap">
            <div class="container">
                        <div class="table-responsive">
                                <table class="table table-bordered nobottommargin">
                                        <thead>
                                        <tr>
                                                <th>No.</th>
                                                <th>Idea Title</th>
                                                <th>Idea No</th>
                                                <th>Idea Description</th>
                                                <th>Category</th>
                                                <th>Idea Posted</th>
                                                <th>Idea By</th>
                                                <th>Approve</th>
                                                <th>Cancel</th>
                                        </tr>
                                        </thead>
                                        <?php
                                        if(mysqli_num_rows($result) > 0)
                                        { //var_dump(mysqli_fetch_array($result));
                                        while($row = mysqli_fetch_array($result))
                                        {
                                        ?>
                                        <tbody>
                                        <tr>
                                                <td> </td>
                                                <td><a href="ideaSingle.php?ideas_number=<?php echo $row['ideas_number'];?>"><?= $row['ideas_title'] ?></a></td>
                                                <td><?php echo $row["ideas_number"];?></td>
                                                <td><?php echo $row["ideas_description"];?></td>
                                                <td><?php echo $row["category_name"];?></td>
                                            <td><?php echo $row["user_name"];?></td>
                                                <td><?php echo $row["posted_time"];?></td>
                                                <th>Approve</th>
                                                <th>Cancel</th>
                                        </tr>
                                        </tbody>
                                                <?php
                                        }
                                        }
                                        ?>
                                </table>
                        </div>
        </div>
        </div>
               <!-- #respond end -->
</section>




        <?php
        } else {
                include 'userLoginFirst.php';
        }

        include 'footer.php';
        }?>

<!-- Serial No of Table Entry -->
<style>
    thead {
        counter-reset: Serial; /* Set the Serial counter to 0 */
    }

    tr td:first-child:before {
        counter-increment: Serial; /* Increment the Serial counter */
        content: counter(Serial); /* Display the counter */
    }
</style>