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
                $_SESSION['successCom'] = 'ok';
                 header('location:ideaSingle.php?ideas_number='.$ideas_number);
        } else {
                echo "Error: " . $sql . "<br>" . $conn->error;

        }
} else echo "Fill-Up All Fields Correctly";



