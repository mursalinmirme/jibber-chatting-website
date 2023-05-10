<?php
include "../php_function/dbconnect.php";
$catchUser_id = $_SESSION['user_id'];
$imageQuery = "SELECT * FROM `users` WHERE user_id='$catchUser_id'";
$runImageQuery = mysqli_query($conn, $imageQuery);
while($getInfo = mysqli_fetch_assoc($runImageQuery)){
    $getUserName = $getInfo['name'];
    $getUserProfile = $getInfo['profile_pic'];
    $getUserPhone = $getInfo['user_phone'];
    $getUserEmail = $getInfo['email'];
    $getUserBiostatus = $getInfo['bio_status'];
}
if($getUserProfile === ''){
    $userProfileLocation = "../photos/profile-pic.png";
}else{
    $userProfileLocation = "../upload/$getUserProfile";
}
?>
<!-- pop up screen for user profile changes -->
<div class="user_profile">
    <div class="user_container">
        <div class="profile_img">
            <img id="profileImg" src="<?php echo $userProfileLocation; ?>" alt="">
            <input type="file" name="file" class="file" id="file">
            <label for="file"><i class="fa-solid fa-camera"></i></label>
        </div>
        <div class="biostatus">
            <p><?php echo $getUserBiostatus; ?></p>
        </div>
        <div class="details">
            <div class="userDetails">
                <label>Name:</label>
                <input type="text" id="inputName" value="<?php echo $getUserName; ?>">
            </div>
            <div class="userDetails">
                <label>Phone:</label>
                <input type="text" id="inputPhone" value="<?php echo $getUserPhone; ?>">
            </div>
            <div class="userDetails">
                <label>Email:</label>
                <input type="email" id="inputEmail" value="<?php echo $getUserEmail; ?>">
            </div>
            <div class="userDetails">
                <label>Description:</label>
                <textarea id="InputBio" placeholder="Write a short bio about yourself"><?php echo $getUserBiostatus; ?></textarea>
            </div>
            <div class="userDetails saveBtnDesign changeImageBtn" id="changeImageBtn">
                <input type="submit" class="saveChangeBtn" id="saveChangeBtn" value="Save Image">
            </div>
            <div class="userDetails saveBtnDesign changeInformation" id="changeInformation">
                <input type="submit" name="<?php echo $catchUser_id; ?>" class="saveInfobtn" id="saveInfoBtn" value="Save Information">
            </div>
        </div>
    </div>
    <div class="clickToHideBtn" id="clickToHideBtn">

    </div>
</div>


<!-- pop up screen for setting changes -->
<div class="setting_page">
    <div class="setting_container">
        <p>setting functionality are comming soon..</p>
    </div>
    <div class="hideSettingBtn" id="hideSettingBtn">

    </div>
</div>













