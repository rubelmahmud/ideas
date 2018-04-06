<?php
//Login checker

$user_email = $_POST['user_email'];
$user_pass = $_POST['user_pass'];
// $user_name = $_POST['user_name'];

include 'connect-db.php';
// $conn = connect();
$sql = "SELECT * FROM user WHERE user_email='$user_email' 
AND user_pass='$user_pass'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
        session_start();
        foreach ($result as $row) {
                $_SESSION["user_id"] = $row['user_id'];
                $_SESSION["user_email"] = $row['user_email'];
                $_SESSION["user_role"] = $row['user_role'];
                
        }
        $_SESSION["loggedin"] = true;
        if ($_SESSION["user_role"] == 1) {              // 0 = supervisor
                header("location:ideaListView.php");
        } else if ($_SESSION["user_role"] == 2) {          //2 = qa
                header("location:userSummary.php");
        } else if ($_SESSION["user_role"] == 3) {          //3 = qac
                header("location:ideaListView.php");
        } else if ($_SESSION["user_role"] == 4) {       //4 = admin
                header("location:userManage.php");
        } else if ($_SESSION["user_role"] == 0) {
                header("location:userLoginFailed.php");
        }

} else {

        header("location:userLoginFailed.php");
}