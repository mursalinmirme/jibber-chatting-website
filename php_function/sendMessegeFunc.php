<?php
if(isset($_POST['sendBtn'])){
    include "dbconnect.php";
    $text = $_POST['text'];
    $outgoing_msg_id = $_POST['messegeto_id'];
    $incoming_msg_id = $_POST['messegefrom_id'];

    $query = "INSERT INTO `messeges`(`incoming_msg_id`, `outgoing_msg_id`, `messege_text`) VALUES ('$incoming_msg_id','$outgoing_msg_id','$text')";
    $messegeSent = mysqli_query($conn,$query);
    if($messegeSent){
        echo "messege sent";
    }
}

?>