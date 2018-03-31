<?php
session_start();

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] != 2) {
        include 'userRestrict.php';
} else {

        if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

//1. connect database
                include 'connect-db.php';

                $category_id = $_GET['category_id'];
//2. generate query to select all data from db table
                $sql = "DELETE from category WHERE category_id=$category_id";

//3. execute query to get result
                $result = $conn->query($sql);

                if ($conn->query($sql)) {
                        $_SESSION['successDelete'] = 'ok';

                        header('location:categoryView.php');

                } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;

                }


        } else {
                include 'userLoginFirst.php';
        }

}?>
