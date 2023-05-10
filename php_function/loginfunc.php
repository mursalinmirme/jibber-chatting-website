<?php
include "dbconnect.php";
if(isset($_POST['loginBtn'])){
$email = $_POST['email'];
$password = $_POST['password'];
$query = "SELECT * FROM `users` WHERE email='$email'";
$runQuery = mysqli_query($conn, $query);
if(mysqli_num_rows($runQuery) === 1){
while($row = mysqli_fetch_assoc($runQuery)){
$passwordHash = $row['password'];
$user_id = $row['user_id'];
if(password_verify($password,$passwordHash)){
session_start();
$_SESSION['logedIn'] = true;
$_SESSION['user_id'] = $user_id;   
$times = time()+8; 
$update_userStatus = "UPDATE `users` SET `status`='$times' WHERE user_id='$user_id'";
mysqli_query($conn,$update_userStatus);
echo "true";
}else{
echo "false";
}
}
}else{
echo "Email and password doesn't matched!";
}
}
?>