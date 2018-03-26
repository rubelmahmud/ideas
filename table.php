 <?php
 include 'header.php';
 $connect = mysqli_connect("localhost", "root", "", "ideas");
 $query ="SELECT * FROM student_ideas, user, category
WHERE student_ideas.user_id = user.user_id AND
student_ideas.category_id = category.category_id
ORDER BY student_ideas.posted_time DESC ";
 $result = mysqli_query($connect, $query);
 ?>
      <body>
           <br /><br />
           <div class="container">
                <h3 align="center">Idea List</h3>
                <br />
                <div class="table-responsive">
                     <table id="employee_data" class="table table-striped table-bordered">
                          <thead>
                          <tr>
                              <th>No.</th>
                              <th>Idea Title</th>
                              <th>Idea Description</th>
                              <th>Category</th>
                              <th>Idea Posted</th>
                              <th>Closer Date</th>
                              <th>Final Closer Date</th>
                              <th>Idea By</th>
                              <th>Click View For Comments</th>
                          </tr>
                          </thead>
                          <?php
                          while($row = mysqli_fetch_array($result))
                          { ?>

                              <tr>
                                  <td></td>
                                  <td>
                                      <a href="ideaSingle.php?ideas_number=<?php echo $row['ideas_number']; ?>"><?= $row['ideas_title'] ?></a>
                                  </td>
                                  <td><?php echo $row["ideas_description"]; ?></td>
                                  <td><?php echo $row["category_name"]; ?></td>
                                  <td><?php echo date("d F, Y", strtotime($row["posted_time"])); ?></td>
                                  <td><?php echo date("d F, Y", strtotime($row["ideas_closer_date"])); ?></td>
                                  <td><?php echo date("d F, Y", strtotime($row["ideas_final_closer_date"])); ?></td>
                                  <td><?php if ($row["ideas_type"] == 1){
                                                  echo "Anonymous";
                                          } else { ?>
                                          <?php echo $row["user_name"]; ?></td>
                                      <?php } ?>
                                  <td>
                                      <a href="ideaSingle.php?ideas_number=<?php echo $row['ideas_number']; ?>">VIEW</a>
                                  </td>
                              </tr>

                         <?php }
                          ?>
                     </table>
                </div>
           </div>
      </body>
 <?php include 'footer.php'; ?>
 <script>
     $(document).ready(function(){
         $('#employee_data').DataTable({
             "pageLength": 5
             // "lengthChange": false
         });
     });
 </script>


 <style>
     thead {
         counter-reset: Serial; /* Set the Serial counter to 0 */
     }

     tr td:first-child:before {
         counter-increment: Serial; /* Increment the Serial counter */
         content: counter(Serial); /* Display the counter */
     }
 </style>