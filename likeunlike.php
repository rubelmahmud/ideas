<?php
session_start();
include "connect-db.php";

$user_id = $_SESSION['user_id'];
$ideas_number = $_POST['ideas_number'];
$type = $_POST['type'];


// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM thumbsupdown WHERE ideas_number=".$ideas_number." and user_id=".$user_id;

$result = mysqli_query($conn,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];


if($count == 0){
        $insertquery = "INSERT INTO thumbsupdown(user_id,ideas_number,type) values(".$user_id.",".$ideas_number.",".$type.")";
        mysqli_query($conn,$insertquery);
}else {
        $updatequery = "UPDATE thumbsupdown SET type=" . $type . " where user_id=" . $user_id . " and ideas_number=" . $ideas_number;
        mysqli_query($conn,$updatequery);
}


// count numbers of like and unlike in post
$query = "SELECT COUNT(*) AS cntLike FROM thumbsupdown WHERE type=1 and ideas_number=".$ideas_number;
$result = mysqli_query($conn,$query);
$fetchlikes = mysqli_fetch_array($result);
$totalLikes = $fetchlikes['cntLike'];

$query = "SELECT COUNT(*) AS cntUnlike FROM thumbsupdown WHERE type=0 and ideas_number=".$ideas_number;
$result = mysqli_query($conn,$query);
$fetchunlikes = mysqli_fetch_array($result);
$totalUnlikes = $fetchunlikes['cntUnlike'];


$return_arr = array("likes"=>$totalLikes,"unlikes"=>$totalUnlikes);

echo json_encode($return_arr);