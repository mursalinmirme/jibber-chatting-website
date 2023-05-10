<?php
include "../php_function/dbconnect.php";
// $incoming_msg_id = $_POST['incoming_msg_id'];
$outgoing_msg_id = $_POST['outgoing_msg_id'];
$notification = "SELECT COUNT(*) AS unread_messages FROM messeges WHERE outgoing_msg_id = {$outgoing_msg_id} AND seen_status = 0";

$runnotification = mysqli_query($conn,$notification);
if ($runnotification) {
    $fetchrunnotification = mysqli_fetch_assoc($runnotification);
    $unread_messages = $fetchrunnotification['unread_messages'];
    // Use $unread_messages to display the number of unread messages
    // echo $unread_messages;
} else {
    // Handle error
}
if($unread_messages > 0){
    echo $unread_messages;
}

?>