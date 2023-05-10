<?php

if(isset($_POST['updatebtn'])){
    include "dbconnect.php";
    $inputName = $_POST['inputName'];
    $inputPhone = $_POST['inputPhone'];
    $inputEmail = $_POST['inputEmail'];
    $InputBio = $_POST['InputBio'];
    $userIdcatch = $_POST['userIdcatch'];
    $updatequery = "UPDATE `users` SET `name`='$inputName',`email`='$inputEmail',user_phone='$inputPhone',`bio_status`='$InputBio' WHERE user_id='$userIdcatch'";
    $runupdatequery = mysqli_query($conn, $updatequery);
    if($runupdatequery){
        echo "Information update successfully";
    }
}

?>