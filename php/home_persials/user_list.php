
<?php 
        $getUserId = $_SESSION['user_id'];
        $query = "SELECT * FROM `users` WHERE user_id = '$getUserId'";
        $runQuery = mysqli_query($conn, $query);
        while($friend_data = mysqli_fetch_assoc($runQuery)){
            $friend_profile = $friend_data['profile_pic'];
            if($friend_profile === ''){
                $friendProfileLocation = "../photos/user.png";
            }else{
                $friendProfileLocation = "../upload/$friend_profile";
            }
        }
    ?>

<div class="side_navbar">
    <div class="navbar_top">
        <div class="apps_logos">
            <h1>Jibber</h1>
        </div>
    </div>
    <div class="navbar_bottom">

    <div id="profile_btn" class="profile_option">
       <img src="<?php echo $friendProfileLocation; ?>" alt="">
           </div>    
    <div class="setting" id="setting_btn">
        <i class="fa-solid fa-gear"></i>
           </div>
    <div class="logout" id="logOutBtn">
        <i class="fa-solid fa-power-off"></i>
            </div>
    </div>

</div>


<div class="user_list">
        <div class="user_listwrap">

            <div class="search_user">
                <input type="search" placeholder="Search your friend.." id="search" name="" class="search">
            </div>





        <div class="usersList_Wrappper">
            



        

            </div><!-- end usersList_Wrappper tag -->

        </div>
    </div>






