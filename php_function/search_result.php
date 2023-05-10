<?php
$times = time();
// $collectuser_id = $_SESSION['user_id'];
while($row = mysqli_fetch_assoc($runQuerytow)){
    $userName = $row['name'];
    $userImage = $row['profile_pic'];
    $messageUid = $row['user_id'];
    $userStatus = $row['status'];

    if($userImage === ''){
        $profileLocation = "../photos/user.png";
    }else{
        $profileLocation = "../upload/$userImage";
    }

    $quersStatus = '';
    if($userStatus > $times){
        $quersStatus = 'userActive';
    }else{
        $quersStatus = 'userInactive';
    }

$lastMsgQuery = "SELECT * FROM `messeges` WHERE (incoming_msg_id = {$messageUid} AND outgoing_msg_id = {$collectuser_id}) OR (incoming_msg_id = {$collectuser_id} AND outgoing_msg_id = {$messageUid}) ORDER BY id DESC LIMIT 1";

$runLastMsgQuery = mysqli_query($conn, $lastMsgQuery);
$getLastMsg = mysqli_fetch_assoc($runLastMsgQuery);
if(mysqli_num_rows($runLastMsgQuery) > 0){
        
         $messegeSubstr = $getLastMsg['messege_text'];
         if(strlen($messegeSubstr) > 30){
            $getLastSentMsg = substr($messegeSubstr,0,30).'...';
         }else{
            $getLastSentMsg = $getLastMsg['messege_text'];
         }
         

}else{
    $getLastSentMsg = "No message available";
}
// ($collectuser_id == $getLastMsg['incoming_msg_id']) ? $you = "You: " : $you = '';
if (isset($collectuser_id) && isset($getLastMsg['incoming_msg_id'])) {
    $you = ($collectuser_id == $getLastMsg['incoming_msg_id']) ? "You: " : '';
  } else {
    // handle the case where either variable is null or undefined
    $you = "";
  }


// testing message notification does working or not
$notification = "SELECT COUNT(*) AS unread_messages FROM messeges
WHERE (incoming_msg_id = {$messageUid} AND outgoing_msg_id = {$collectuser_id}) AND seen_status = 0";

$runnotification = mysqli_query($conn,$notification);
if ($runnotification) {
    $fetchrunnotification = mysqli_fetch_assoc($runnotification);
    $unread_messages = $fetchrunnotification['unread_messages'];
    // Use $unread_messages to display the number of unread messages
} else {
    // Handle error
}
if($unread_messages > 0){
    $showNotification = '<span>'.$unread_messages.'</span>';
}else{
    $showNotification = '<p></p>';
}


echo '<div class="single_user '.$quersStatus.'">
<div class="singleUserImg">
<a href="chat_home.php?user_id='.$messageUid.'">
    <img src="'.$profileLocation.'" alt="">
    </a>
</div>
<div class="nameandlastmsg">
    <a href="chat_home.php?user_id='.$messageUid.'">
<div class="singleUserName">
    <span>'.$userName.'</span>
</div>
<div class="singleUserLastMsg">
    <span>'. $you . $getLastSentMsg .'</span>
</div>
    </a>
</div>
<div class="messegeNotification">

'.$showNotification.'

</div>
</div>';
}
?>