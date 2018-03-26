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

                $sql = "SELECT * FROM category";

                //3. execute query to get result
                $result = mysqli_query($conn, $sql);
                //4. show data in html template
                ?>


                <h4>Category table</h4>

                <div class="table-responsive">
                    <table class="table table-bordered nobottommargin">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Ideas Closer Date</th>
                            <th>Ideas Final Closer Date</th>
                            <th>Remove</th>
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
                            <td><?php echo $row["ideas_closer_date"];?></td>
                            <td><?php echo $row["ideas_final_closer_date"];?></td>
                            <td> Remove</td>
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
                    include 'userLoginFailed.php';
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
