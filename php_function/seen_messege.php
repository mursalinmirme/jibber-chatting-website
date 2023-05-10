<?php
include "../php_function/dbconnect.php";

$incoming_msg_id = $_POST['incoming_msg_id'];
$outgoing_msg_id = $_POST['outgoing_msg_id'];



// $makeQuery = "SELECT * FROM messeges WHERE (incoming_msg_id = {$incoming_msg_id} AND outgoing_msg_id = {$outgoing_msg_id}) OR (incoming_msg_id = {$outgoing_msg_id} AND outgoing_msg_id = {$incoming_msg_id}) ORDER BY id";

// $makeQuery = "UPDATE `messeges` SET `seen_status`=1 WHERE (incoming_msg_id = {$incoming_msg_id} AND outgoing_msg_id = {$outgoing_msg_id}) OR (incoming_msg_id = {$outgoing_msg_id} AND outgoing_msg_id = {$incoming_msg_id})";


$makeQuery = "UPDATE `messeges` SET `seen_status`=1 WHERE (incoming_msg_id = {$incoming_msg_id} AND outgoing_msg_id = {$outgoing_msg_id})";

$runUpdateSeenQuery = mysqli_query($conn, $makeQuery);
if($runUpdateSeenQuery){
    echo 'seen requers submitted';
}


?>