<?php
include "dbconnect.php";
session_start();
$collectuser_id = $_SESSION['user_id'];
$getsearchText = $_POST['getsearchText'];

$searchTerm = mysqli_real_escape_string($conn, $getsearchText);

$runQueryser = "SELECT * FROM `users` WHERE NOT user_id='$collectuser_id' AND (name LIKE '%{$searchTerm}%')";

$runQuerytow = mysqli_query($conn, $runQueryser);
$searchResult = "";
if(mysqli_num_rows($runQuerytow) > 0){
    include "search_result.php";
}else{
    $searchResult .= "<p style='color:#363637; margin-top:15px;' class='nosearchMatchedMsg'>No  users found to your search result</p>";
}
echo $searchResult;

?>