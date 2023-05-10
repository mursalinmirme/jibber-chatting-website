<?php
if(isset($_POST['requestSER'])){
include "../../php_function/dbconnect.php";
$incoming_msg_id = $_POST['incoming_msg_id'];
$outgoing_msg_id = $_POST['outgoing_msg_id'];

$makeQuery = "SELECT * FROM messeges 
LEFT JOIN users ON users.user_id = messeges.incoming_msg_id
WHERE (incoming_msg_id = {$incoming_msg_id} AND outgoing_msg_id = {$outgoing_msg_id}) OR (incoming_msg_id = {$outgoing_msg_id} AND outgoing_msg_id = {$incoming_msg_id}) ORDER BY messeges.id";
$runmakeQuery = mysqli_query($conn,$makeQuery);

if(mysqli_num_rows($runmakeQuery) > 0){
    while($row = mysqli_fetch_assoc($runmakeQuery)){
        if($row['outgoing_msg_id'] === $outgoing_msg_id){//thats mean he is a msg sender
             echo '<div class="chat incoming">
             <img src="../upload/'.$row['profile_pic'].'" alt="">
                 <div class="details">
                    <p>'.$row['messege_text'].'</p>
                        </div>
                           </div>';
        }else{//he is a reciver
             echo '<div class="chat outgoing">
             <div class="details">
               <p>'.$row['messege_text'].'</p>
                  </div>
                    </div>';
        }
    }
}

}

?>









