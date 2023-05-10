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
    <title>chat_application</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/6d208b1cbc.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="signing_bg">
      <img src="photos/loginbg.gif" alt="">
    </div>
    <div class="signin_page">
      <div class="container">
        <div class="app_logo">
          <h1>Jibber</h1>
        </div>
        <div class="login_form">
          <div class="login_system">
            <b>Let's Sign in with Google</b>
              </div>
          <div class="login_greeting">  
            <span>Welcome Back, you've been missed !</span>
              </div>  
          <form class="form">
            <div class="emailbox inputbox">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" class="email login_input" id="email" name="email" placeholder="johndoe@gmail.com">
            </div>
            <div class="passwordbox inputbox">
              <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" id="password" class="password login_input" placeholder="Enter your password">
            </div>
            <div class="forgetbox">
            <input type="checkbox" name="checkbox" id="checkbox" class="checkbox">
            <span>Remember me</span>
            <p><a href="">Forget password?</a></p>
            </div>
            <div class="buttonbox">
            <button id="loginbutton" class="button" name="button">Sign in</button>
            </div>
            <span class="createanaccount">Already have not an account ?<a href="php/signup.php
            ">Sign up !</a></span>
          </form>
        </div>
      </div>
    </div>
  </body>
  <script src="javascript/jquery-3.6.3.min.js"></script>
  <script src="javascript/loginfunc.js"></script>
</html>
