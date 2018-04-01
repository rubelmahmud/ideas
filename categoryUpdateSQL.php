<?php
session_start();

$category_name  	        = $_POST ['category_name'];
$category_desc 	            = $_POST ['category_desc'];
$ideas_closer_date      	= $_POST ['ideas_closer_date'];
$ideas_final_closer_date 	= $_POST ['ideas_final_closer_date'];
$cat_id                     = $_POST ['category_id'];

$flag = 0;

if (!isset($category_name)) {
        echo 'Please write topic description' ;

        $flag = 1;
} else {

        echo "Category ID: $category_name";
}
if (!isset($category_desc)) {
        echo 'Please write topic description' ;
        $flag = 1;
} else {
        echo "Topic Description: $category_desc";
}

if (!isset($ideas_closer_date)) {
        echo 'Please select taking closer date';
        $flag = 1;
} else {
        echo "Taking closer date:$ideas_closer_date";
}
if ($flag == 0) {

include 'connect-db.php';

$sql = "UPDATE category SET category_name='$category_name', category_desc='$category_desc', 
ideas_closer_date='$ideas_closer_date', ideas_final_closer_date='$ideas_final_closer_date' 
WHERE category_id=$cat_id";

if ($conn->query($sql)) {
        $_SESSION['successCatU'] = 'ok';
        header('location:categoryView.php');
} else {
        echo "Error: " . $sql . "<br>" . $conn->error;

}
} else echo "Fill-Up All Fields Correctly";
