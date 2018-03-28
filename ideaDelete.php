<?php
session_start();


if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

//1. connect database
        include 'connect-db.php';

        $ideas_number = $_GET['ideas_number'];
//2. generate query to select all data from db table
        $sql = "DELETE from student_ideas WHERE ideas_number=$ideas_number";

//3. execute query to get result
        $result = $conn->query($sql);

        if ($conn->query($sql)) {
                $_SESSION['successDelete'] = 'ok';

                header('location:ideaListViewQAC.php');

        } else {
                echo "Error: " . $sql . "<br>" . $conn->error;

        }


} else {
        include 'userLoginFirst.php';
}

?>
