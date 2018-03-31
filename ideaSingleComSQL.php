<?php
/**
 * Created by PhpStorm.
 * User: Rubel
 * Date: 3/16/2018
 * Time: 1:49 PM
 */
session_start();
$comment_description = $_POST['comment_description'];
$user_id = $_SESSION['user_id'];
$ideas_number = $_POST['ideas_number'];

if(isset($_POST['comment_type'])){
        $comment_type = $_POST['comment_type'];
} else {
        $comment_type = 0;
}




$flag = 0;

if (!isset($comment_description)) {
        echo 'Please write idea title'. '<br>' ;

        $flag = 1;
} else {

        echo "Idea Title: $comment_description".'<br>';
}

if ($flag == 0) {

        include 'connect-db.php';


        $sql = "INSERT INTO comment(comment_description, comment_type, ideas_number, user_id)
VALUES ('$comment_description', '$comment_type', '$ideas_number', '$user_id')";


        if ($conn->query($sql)) {

                $user_id = $_SESSION['user_id'];
                $user_email =$_SESSION['user_email'];

                $resultN = $conn->query("SELECT user_name as user_name FROM user 
                          WHERE user_id = $user_id");

                foreach ($resultN as $r) {

                        $user_name = $r['user_name'];
                }


                $sql = "SELECT * FROM student_ideas, user
                WHERE student_ideas.user_id = user.user_id
                AND ideas_number=$ideas_number";

                $result = $conn->query($sql);

                foreach ($result as $row) {

                        $author_name = $row['user_name'];
                        $author_email = $row['user_email'];
                        $ideas_title = $row ['ideas_title'];
                        $ideas_number = $row ['ideas_number'];


// sending email to comment poster

                        include 'mailSender.php';

                        if ($_SESSION['user_role'] == 0) {

                                /// the message
                                $mail->Body = 'Dear ' . $user_name . ', Your comment has been posted successfully on this IDEA= (' . $ideas_title . ')';
// notification
                                $mail->addAddress($user_email, $user_name);

                                if (!$mail->Send()) {
                                        echo "Mailer Error: " . $mail->ErrorInfo;
                                } else {
                                        echo "Message sent!<br>";
                                }


// sending email to idea author

                                $mail2 = clone $mail;

                                $mail2->addAddress($author_email, $author_name);

                                $mail2->Body = 'Dear ' . $author_name . ', A comment has been added to your IDEA= (' . $ideas_title . ')';


                                if (!$mail2->Send()) {
                                        echo "Mailer Error: " . $mail->ErrorInfo;
                                } else {
                                        echo "Message sent!<br>";
                                }

                        } else if ($_SESSION['user_role'] != 0) {
                                /// the message
                                $mail->Body = 'Dear ' . $user_name . ', Your comment has been posted successfully on this IDEA= (' . $ideas_title . ')';
// notification
                                $mail->addAddress($user_email, $user_name);

                                if (!$mail->Send()) {
                                        echo "Mailer Error: " . $mail->ErrorInfo;
                                } else {
                                        echo "Message sent!<br>";
                                }
                        }

                }

// success msg
                $_SESSION['successCom'] = 'ok';
                 header('location:ideaSingle.php?ideas_number='.$ideas_number);
        } else {
                echo "Error: " . $sql . "<br>" . $conn->error;

        }
} else echo "Fill-Up All Fields Correctly";



