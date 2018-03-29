<?php
session_start();

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

        $sql = "INSERT INTO student_ideas(ideas_title, ideas_description, ideas_type, category_id, user_id, file) 
VALUES ('$ideas_title', '$ideas_description', '$ideas_type', '$category_id', '$user_id', 'zip_file/$source_file')";



        if ($conn->query($sql)) {

// success message
                $_SESSION['successIdea'] = 'ok';
                header('location:ideaSubmit.php');
        } else {
                echo "Error: " . $sql . "<br>" . $conn->error;

        }
} else echo "Fill-Up All Fields Correctly";



