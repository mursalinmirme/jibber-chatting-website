<?php
include "dbconnect.php";
if(isset($_POST['signupBtn'])){
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordHash = password_hash($password,PASSWORD_DEFAULT);
$match_email = "SELECT * FROM `users` WHERE email='$email'";
$processing_email = mysqli_query($conn, $match_email);
if(mysqli_num_rows($processing_email) === 1){
echo "This email has already an account!";
}else{
$unic_code = uniqid('', false);
$unic_id = hexdec($unic_code);
$query = "INSERT INTO `users`(`user_id`, `name`, `email`, `password`) VALUES ('$unic_id','$name','$email','$passwordHash')";
$submit = mysqli_query($conn,$query);
if($submit){
echo "true";
}else{
echo "false";
}
}
}
?>