<?php
// email verify AJAX reply
$user_email = $_GET['user_email'];
include 'connect-db.php';

//2. generate query to select all data from db table
$sql = "SELECT * FROM user WHERE user_email='$user_email'";

//3. execute query to get result
$result = $conn->query($sql);

if($result->num_rows > 0){
        echo 1;
}else{
        echo 0;
}