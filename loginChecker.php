<?php
//Login checker

$user_email = $_POST['user_email'];
$user_pass = $_POST['user_pass'];

include 'connect-db.php';
// $conn = connect();
$sql = "SELECT * FROM user WHERE user_email='$user_email' AND user_pass='$user_pass' AND user_role = 0 AND DATE(a_year) > DATE(now())";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
        session_start();
        foreach ($result as $row) {
                $_SESSION["user_id"] = $row['user_id'];
                $_SESSION["user_email"] = $row['user_email'];
                $_SESSION["user_role"] = $row['user_role'];
                
        }
        $_SESSION["loggedin"] = true;
       
      if ($_SESSION["user_role"] == 0) {    // 0 = student
                header("location:ideaListView.php");
        } else if ($_SESSION["user_role"] !== 0) {          
                header("location:userLoginFailed.php");
       }

} else {

        header("location:userLoginFailed.php");
}