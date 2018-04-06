<?php
//Login checker

$user_pin = $_POST['user_pin'];

include 'connect-db.php';
// $conn = connect();
$sql = "SELECT * FROM user WHERE user_pin='$user_pin'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
        session_start();
        foreach ($result as $row) {
                $_SESSION["user_pin"] = $row['user_pin'];
        }

        $_SESSION["loggedin"] = true;

        if ($_SESSION["user_pin"] == true) {
                  // 0 = student
                header("location:loginStaff.php");
       } else if ($_SESSION["user_role"] == false) {
               header("location:userLoginPinFailed.php");
        }

} else {
        $_SESSION['successPin'] = 'ok';
        header("location:userLoginPinFailed.php");
}