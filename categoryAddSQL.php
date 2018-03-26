<?php
/**
 * Created by PhpStorm.
 * User: Rubel
 * Date: 3/16/2018
 * Time: 1:49 PM
 */
session_start();

$category_name = $_POST['category_name'];
$category_desc = $_POST['category_desc'];
$ideas_closer_date = $_POST['ideas_closer_date'];
$ideas_final_closer_date = $_POST['ideas_final_closer_date'];

$flag = 0;

if (!isset($category_name)) {
        echo 'Please write topic description' ;

        $flag = 1;
} else {

        echo "Category ID: $category_name";
}
if (!isset($ideas_closer_date)) {
       echo 'Please write topic description' ;
        $flag = 1;
} else {
        echo "Topic Description: $ideas_closer_date";
}

if (!isset($category_desc)) {
       echo 'Please select taking closer date';
        $flag = 1;
} else {
        echo "Taking closer date:$category_desc";
}
if ($flag == 0) {

        include 'connect-db.php';


        $sql = "INSERT INTO category(category_name, category_desc, ideas_closer_date, ideas_final_closer_date, created_time)
VALUES ('$category_name', '$category_desc', '$ideas_closer_date', '$ideas_final_closer_date', now())";

        if ($conn->query($sql)) {
                echo '<script>alert("Category added successfully."); </script>';
                // include 'categoryAdd.php';

              header('location:categoryAdd.php');
        } else {
                echo "Error: " . $sql . "<br>" . $conn->error;

        }
} else echo "Fill-Up All Fields Correctly";



