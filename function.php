<?php
function createDB()
{
    @$connection = mysqli_connect("localhost", "root", "")
    or die("Couldn't establish database connection, please check your database connection");
    $queryCreateBD = "CREATE DATABASE db_name";
    $result = mysqli_query($connection, $queryCreateBD);
    if (!$result) {
        echo "Error: " . mysqli_error($connection);
    } else {
        echo "<font color=\"green\"><center><h2>A new database called \"db name\" has been 
created to use the web application.<br><br> </h2></center></font>";
    }
}

;

function connection()
{
    @$connection = mysqli_connect("localhost", "root", "")
    or die("Couldn't establish database connection, please check your database connection");
}

;

function connectionDB()
{
    @$connection = mysqli_connect("localhost", "root", "")
    or die("Couldn't establish database connection, please check your database connection");
    mysqli_select_db($connection, "ideas");
}

;