<?php
session_start();

$user_name  	= $_POST['user_name'];
$user_email 	= $_POST['user_email'];
$user_address 	= $_POST['user_address'];
$user_phone 	= $_POST['user_phone'];
$user_id        = $_POST['user_id'];

$flag = 0;

if (!isset($user_name)) {
        echo 'Please write topic description' ;

        $flag = 1;
} else {

        echo "Category ID: $user_name";
}
if (!isset($user_email)) {
        echo 'Please write topic description' ;
        $flag = 1;
} else {
        echo "Topic Description: $user_email";
}

if (!isset($user_address)) {
        echo 'Please select taking closer date';
        $flag = 1;
} else {
        echo "Taking closer date:$user_address";
}
if ($flag == 0) {

include 'connect-db.php';

$sql = "UPDATE user SET user_name='$user_name', user_email='$user_email', user_address='$user_address', user_phone='$user_phone' WHERE user_id=$user_id";

if ($conn->query($sql)) {
        $_SESSION['successUU'] = 'ok';
        header('location:userManage.php');
} else {
        echo "Error: " . $sql . "<br>" . $conn->error;

}
} else echo "Fill-Up All Fields Correctly";
