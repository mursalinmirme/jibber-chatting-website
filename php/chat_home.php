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
    <title>Welcome - <?php echo $queryuseridname; ?></title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/chat_home.css">
    <link rel="stylesheet" href="../css/popupscreen.css">
    <script src="https://kit.fontawesome.com/6d208b1cbc.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="home_wrapper">

<?php include "home_persials/user_list.php" ?>

<div class="chat_home" id="chat_home">
    <?php 
        $getUserId = $_GET['user_id'];
        $query = "SELECT * FROM `users` WHERE user_id = '$getUserId'";
        $runQuery = mysqli_query($conn, $query);
        while($friend_data = mysqli_fetch_assoc($runQuery)){
            $friend_name = $friend_data['name'];
            $friend_profile = $friend_data['profile_pic'];
            $friend_number = $friend_data['user_phone'];
            $friend_email = $friend_data['email'];
            $friend_bio = $friend_data['bio_status'];
            $userStatus = $friend_data['status'];
            if($friend_profile === ''){
                $friendProfileLocation = "../photos/user.png";
            }else{
                $friendProfileLocation = "../upload/$friend_profile";
            }
            $times = time();
            $quersStatus = '';
            if($userStatus > $times){
               $quersStatus = 'online';
            }else{
               $quersStatus = 'offline';
            }

        }
    ?>
        <div class="container">
            <div class="topbar">
                <div class="topbar_left">
                    <div class="topbar_image">
                    <img src="<?php echo $friendProfileLocation; ?>" alt="">
                    </div>
                    <div class="topbar_name">
                        <span><?php echo $friend_name; ?></span>
                        <p class="<?php echo $quersStatus; ?>"><?php echo $quersStatus; ?></p>
                    </div>

                </div>
            </div>
            <div id="messagearea" class="chat-box messagearea">
            

        
            </div>
            <!-- message typing bottom -->
            <div class="typingarea">
                <div name="<?php echo $_GET['user_id'];?>" id="inputwrap" class="inputwrap">
                <input type="text" name="text" id="text" class="text" placeholder="Send a Message...">
                <img name="<?php echo $_SESSION['user_id']; ?>" id="sendMsgBtn" src="../photos/paper-plane.png" alt="">
                </div>
            </div>
        </div>
    </div>

<div class="profile">
    <div class="profile_pic">
        <img src="<?php echo $friendProfileLocation; ?>" alt="">
    </div>
    <div class="profile_name">
        <span><?php echo $friend_name; ?></span>
    </div>
    <div class="messege_lastseen">
        <span>Last seen: 1 day ago</span>
    </div>
    <div class="profile_about">
        <p>About</p>
        <span><?php echo $friend_bio; ?></span>
    </div>
    <div class="profile_phone">
        <p>Phone</p>
        <span><?php echo $friend_number; ?></span>
        <p>Email</p>
        <span><?php echo $friend_email; ?></span>
    </div>
</div>


</div>

<!-- profile editing code start -->
<?php include_once "home_persials/popupscreen.php" ?>




</body>
<script src="../javascript/jquery-3.6.3.min.js"></script>
<script src="../javascript/home.js"></script>
<script src="../javascript/sendMessegeFunc.js"></script>
<script src="../javascript/get_msg.js"></script>
<script src="../javascript/uploadPic.js"></script>
<script src="../javascript/style.js"></script>
<script src="../javascript/logout.js"></script>
<script src="../javascript/seen_msg.js"></script>
<script src="../javascript/notification_sound.js"></script>
</html>