<?php
session_start();
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != 2){
        include 'userRestrict.php';
}else{

include 'header.php';


if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

?>

<!-- Content
		============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container">


                <?php
                //1. connect database
                include 'connect-db.php';

                //2. generate query to select all data from db table

                $sql = "SELECT * FROM category ORDER BY `category`.`created_time` DESC";

                //3. execute query to get result
                $result = mysqli_query($conn, $sql);
                //4. show data in html template
                ?>


                <h4>Category List</h4>
                    <?php
                    if (isset($_SESSION['successDelete'])) {
                            ?>

                        <div class="alert alert-success">
                            <i class="icon-thumbs-up"></i><strong>This category has been removed</strong>
                        </div>
                            <?php
                            unset($_SESSION['successDelete']);

                    }
                    ?>

                    <?php
                    if(isset($_SESSION['successCatU'])){
                            ?>

                        <div class="alert alert-success">
                            <i class="icon-thumbs-up"></i><strong>Category updated successfully</strong>
                        </div>
                            <?php
                            unset($_SESSION['successCatU']);

                    }
                    ?>

                <div class="table-responsive">
                    <table class="table table-bordered nobottommargin">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Created Time</th>
                            <th>Ideas Closer Date</th>
                            <th>Ideas Final Closer Date</th>
                            <th>Update Category</th>
                            <th>Remove Category</th>
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
                            <td><?php echo $row["category_name"];?></td>
                            <td><?php echo $row["category_desc"];?></td>
                            <td><?php echo $row["created_time"];?></td>
                            <td><?php echo $row["ideas_closer_date"];?></td>
                            <td><?php echo $row["ideas_final_closer_date"];?></td>
                            <td><a href="categoryUpdate.php?category_id=<?= $row['category_id'] ?>">Update</td>

                            <?php
                            $catId = $row["category_id"];
                             $sqlC = "SELECT * FROM student_ideas where category_id=$catId";
                             $resultC = mysqli_query($conn, $sqlC);

                             if (mysqli_num_rows($resultC)>0){ ?>
                                <td>Can't Remove</td>
                          <?php  } else { ?>
                                 <td><a href="categoryDelete.php?category_id=<?= $row['category_id'] ?>">Remove</a></td>
                        <?php  } ?>

                        </tr>
                        </tbody>
                           <?php
                                }
                            }
                            ?>

                    </table>
                </div>
                <div class="line"></div>
            </div>
    </div>
</section>
           <!-- #respond end -->

            <?php
            } else {
                    include 'userLoginFirst.php';
            }

            include 'footer.php';
            }  ?>


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
