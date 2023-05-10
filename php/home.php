<?php
session_start();
if(!isset($_SESSION['logedIn']) || $_SESSION != true){
    header("location: ../index.php");
    exit;
}

?>

<?php 
include "../php_function/dbconnect.php";
        $userid = $_SESSION['user_id'];
        $queryuserid = "SELECT * FROM `users` WHERE user_id = '$userid'";
        $runQuery = mysqli_query($conn, $queryuserid);
        while($queryuserid = mysqli_fetch_assoc($runQuery)){
            $queryuseridname = $queryuserid['name'];
        }
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $queryuseridname; ?></title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/popupscreen.css">
    <script src="https://kit.fontawesome.com/6d208b1cbc.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="home_wrapper">

<?php include "home_persials/user_list.php" ?>

<div id="sendMsgBtn" class="homeMsg" name="<?php echo $userid; ?>">
    <span>Start Chatting with anyone</span>
</div>


</div>


<!-- profile editing code start -->
<?php include_once "home_persials/popupscreen.php" ?>




</body>
<script src="../javascript/jquery-3.6.3.min.js"></script>
<script src="../javascript/sendMessegeFunc.js"></script>
<script src="../javascript/home.js"></script>
<script src="../javascript/style.js"></script>
<script src="../javascript/uploadPic.js"></script>
<script src="../javascript/logout.js"></script>
</html>