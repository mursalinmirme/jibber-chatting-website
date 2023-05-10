<?php

include "dbconnect.php";
session_start();
$collectuser_id = $_SESSION['user_id'];
$query = "SELECT * FROM `users` WHERE NOT user_id='$collectuser_id'";
$runQuerytow = mysqli_query($conn,$query);
include "search_result.php";
?>