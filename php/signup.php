<?php
session_start();
if(isset($_SESSION['logedIn']) || $_SESSION == true){
    header("location: php/home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>chat_application/sign up</title>
    <link rel="stylesheet" href="../css/signup.css">
    <script src="https://kit.fontawesome.com/6d208b1cbc.js" crossorigin="anonymous"></script>
  </head>
  <body>
  <div class="signup_bg">
      <img src="../photos/regbg.gif" alt="">
    </div>
    <div class="signup_page">
      <div class="container">
        <div class="app_logo">
          <h1>Jibber</h1>
        </div>
        <div class="login_form">
          <div class="login_system">
            <b>Let's Sign up with Google</b>
              </div>
          <div class="login_greeting">  
            <span>Welcome, Join our community of users!</span>
              </div>  
          <form class="form">
            <div class="namebox inputbox">
                <i class="fa-solid fa-user"></i>
            <input type="text" class="name login_input" id="name" name="name" placeholder="Enter your name...">
            </div>
            <div class="emailbox inputbox">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" class="email login_input" id="email" name="email" placeholder="johndoe@gmail.com" required>
            </div>
            <div class="passwordbox inputbox">
              <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" id="password" class="password login_input" placeholder="Enter your password">
            <i id="passwordShow" class="fa-solid fa-eye visibiltyBtn"></i>
            </div>
            
            <div class="buttonbox">
            <button id="signUpBtn" class="button" name="button">Sign Up</button>
            </div>
            <span class="createanaccount">Already have an account ?<a href="../index.php">Sign up!</a></span>
          </form>
        </div>
      </div>
    </div>
    <div class="congratulation_page">
    <!-- <div class="congrats_bg">
        <img src="../photos/congrats-bg.gif" alt="">
    </div>
    <div class="fireworks_bg">
        <img src="../photos/fireworks.gif" alt="">
    </div>
    <div class="lighting_bg">
        <img src="../photos/lighting-bg.gif" alt="">
    </div>
    <div class="congrats_arrange">
       <div class="congrats_arrageWrap"> 
        <div class="greeting_con">
          <b>Congratulation,</b>
        </div>
        <div id="greeting_name" class="greeting_name">
            <p>Mursalin Mir</p>
        </div>
        <div class="grettion_status">
            <span>"We're thrilled to have you as a new member of our community. Our goal is to provide you with the best experience possible, and we hope that you'll find everything you need here. Thank you<br> for joining us, and we look forward to seeing you around!"</span>
        </div>  
        <div class="going_loginpage">
            <a href="../index.php">Login Now -> </a>
        </div>
       </div> 
  </div> -->
    </div>

  </body>
  <script src="../javascript/jquery-3.6.3.min.js"></script>
  <script src="../javascript/signup.js"></script>
</html>