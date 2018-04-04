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
                <span>View Ideas</span>
                <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Idea</li>
                </ol>
        </div>

</section><!-- #page-title end -->
<!-- Content
           ============================================= -->
                <?php
                include 'connect-db.php';

                $uId = $_SESSION['user_id'];
                $queryDep = "SELECT * FROM user, department
WHERE user.department_id = department.department_id
AND user.user_id =$uId";

                $resultDep = mysqli_query($conn, $queryDep);
                foreach ($resultDep as $r) {

                        $dep = $r['department_id'];
                        $depN = $r['department_name'];
                }


$sql = "SELECT * FROM student_ideas, user, category, department
WHERE student_ideas.user_id = user.user_id 
AND student_ideas.category_id = category.category_id
AND user.department_id = department.department_id
AND department.department_id=$dep
ORDER BY student_ideas.posted_time DESC";



$result = mysqli_query($conn, $sql);
?>

<section id="content">
        <div class="content-wrap">
            <div class="container">
                <h3 align="center">Manage Ideas</h3>
                <h5 align="center" style="color: orange;"> My Department ( <?php echo $depN?> )</h5>
                    <?php
                    if (isset($_SESSION['successDelete'])) {
                            ?>

                        <div class="alert alert-success">
                            <i class="icon-thumbs-up"></i><strong>This idea has been removed</strong>
                        </div>
                            <?php
                            unset($_SESSION['successDelete']);

                    }
                    ?>
                        <div class="table-responsive">
                                <table class="table table-bordered nobottommargin" id="" style="margin-top: 15px;">
                                        <thead>
                                        <tr style="background-color: #1bbc9b; color: white;">
                                                <th>No.</th>
                                                <th>Idea Title</th>
                                                <th style="width: 200px;">Idea Description</th>
                                                <th>Category</th>
                                                <th>Idea Posted</th>
                                                <th>Idea By</th>
                                                <th>Remove Idea</th>
                                        </tr>
                                        </thead>
                                        <?php
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                        while($row = mysqli_fetch_array($result))
                                        {
                                        ?>
                                        <tbody>
                                        <tr>
                                                <td> </td>
                                                <td>
                                                    <a href="ideaSingle.php?ideas_number=<?php echo $row['ideas_number']; ?>"><?= $row['ideas_title'] ?></a>
                                                </td>
                                                <td><?php echo $row["ideas_description"];?></td>
                                                <td><?php echo $row["category_name"];?></td>
                                                <td><?php echo date("d F, Y", strtotime($row["posted_time"])); ?></td>
                                                <td><?php if ($row["ideas_type"] == 1){
                                                            echo "Anonymous";
                                                    } else {
                                                    echo $row["user_name"]; ?>
                                                </td>
                                                <?php } ?>

                                                <td><a href="ideaDelete.php?ideas_number=<?= $row['ideas_number'] ?>"><div class="icon-remove"></div> Remove</td>
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

<script>
    $(document).ready(function(){
        $('#manage_idea_qac').DataTable({
            "pageLength": 10
            // "lengthChange": false
        });
    });
</script>