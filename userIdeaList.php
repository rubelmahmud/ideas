<section id="content">
        <div class="content-wrap">
                <div class="container">
                        <h3 align="center">MY IDEA LIST</h3>
                        <br/>
                        <div class="table-responsive">
                                <table id="idea_data" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>

                                                <th>Idea Title</th>
                                                <th>Idea Description</th>
                                                <th>Category</th>
                                                <th>Idea Posted</th>
                                                <th>Comment Closer Date</th>
                                                <th>Click View Details</th>
                                        </tr>
                                        </thead>
                                        <?php if(mysqli_num_rows($result) > 0)
                                        {
                                        while ($row = mysqli_fetch_array($result)) { ?>

                                                <tr>
                                                        <td>
                                                            <a href="ideaSingle.php?ideas_number=<?php echo $row['ideas_number']; ?>"><?= $row['ideas_title'] ?></a>
                                                        </td>
                                                        <td><?php echo $row["ideas_description"]; ?></td>
                                                        <td><?php echo $row["category_name"]; ?></td>
                                                        <td><?php echo date("d F, Y", strtotime($row["posted_time"])); ?></td>
                                                        <td><?php echo date("d F, Y", strtotime($row["ideas_final_closer_date"])); ?></td>
                                                        <td>
                                                                <a href="ideaSingle.php?ideas_number=<?php echo $row['ideas_number']; ?>">VIEW DETAILS</a>
                                                        </td>
                                                </tr>

                                        <?php } }
                                        ?>
                                </table>
                        </div>
                </div>
        </div>
</section>

<script>
    $(document).ready(function(){
        $('#idea_data').DataTable({
            "pageLength": 5
            // "lengthChange": false
        });
    });
</script>

