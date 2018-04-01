<?php
session_start();

// gmail pass:  ewsd12345mydw!

$ideas_title = $_POST['ideas_title'];
$ideas_description = $_POST['ideas_description'];
if(isset($_POST['ideas_type'])){
        $ideas_type = $_POST['ideas_type'];
} else {
        $ideas_type = 0;
}

$category_id = $_POST['category_id'];
$user_id = $_SESSION['user_id'];



$flag = 0;

if (!isset($ideas_title)) {
        echo 'Please write idea title'. '<br>' ;

        $flag = 1;
} else {

        echo "Idea Title: $ideas_title".'<br>';
}
if (!isset($ideas_description)) {
        echo 'Please write idea description'.'<br>' ;
        $flag = 1;
} else {
        echo "Idea Description: $ideas_description".'<br>';
}

if (!isset($category_id)) {
        echo 'Please select a category'.'<br>';
        $flag = 1;
} else {
         echo "Category: $category_id".'<br>';
}

if ($flag == 0) {
        include 'connect-db.php';

                include 'uploadZipFile.php';

      if ($total<1) {
              $sql = "INSERT INTO student_ideas(ideas_title, ideas_description, ideas_type, category_id, user_id) 
VALUES ('$ideas_title', '$ideas_description', '$ideas_type', '$category_id', '$user_id')";
      } else {
              $sql = "INSERT INTO student_ideas(ideas_title, ideas_description, ideas_type, category_id, user_id, file) 
VALUES ('$ideas_title', '$ideas_description', '$ideas_type', '$category_id', '$user_id', 'uploadFileZip/$source_file')";
      }




        if ($conn->query($sql)) {

                $ $user_id = $_SESSION['user_id'];
                $user_email =$_SESSION['user_email'];

                $resultN = $conn->query("SELECT user_name as user_name FROM user 
                          WHERE user_id = $user_id");
                foreach ($resultN as $r) {

                        $user_name = $r['user_name'];
                }


// Mail Send
                include 'mailSender.php';
/// the message
                $mail->Body = 'Dear ' . $user_name . ',<br> <br> Your IDEA has been posted successfully. ';


                // notification
                $mail->addAddress($user_email, $user_name);

                if (!$mail->send()) {
                        echo 'Mail could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                        echo 'Mail has been sent, check your inbox/spam please <br><br>';
                }

// success message
                $_SESSION['successIdea'] = 'ok';
                 header('location:ideaSubmit.php');


        } else {
                echo "Error: " . $sql . "<br>" . $conn->error;

        }
} else echo "Fill-Up All Fields Correctly";



