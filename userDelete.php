<?php
session_start();

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] != 4) {
        include 'userRestrict.php';
} else {

        if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {
//1. connect database
                include 'connect-db.php';

                $user_id = $_GET['user_id'];
//2. generate query to select all data from db table
                $sql = "DELETE from user WHERE user_id=$user_id";

//3. execute query to get result
                $result = $conn->query($sql);

                if ($conn->query($sql)) {
                        $_SESSION['successDelete'] = 'ok';

                        header('location:userManage.php');

                } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;

                }


        } else {
                include 'userLoginFirst.php';
        }

}?>
