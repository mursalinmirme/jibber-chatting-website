$(document).ready(function(){

    // start password keyup function
    $("#password").keyup(function(){
        if($(this).val() !== ""){
            $("#passwordShow").css("opacity","1");
                }
    })//end password keyup function

    // start passwrod visibility function
    $(".visibiltyBtn").click(function(){
        $(this).toggleClass("fa-eye fa-eye-slash");
        var passInput = $("#password");
        if(passInput. attr('type')==='password'){
            passInput. attr('type','text');
        }else{
            passInput. attr('type','password');
        }
    })//password visibility function end


    // post ajax signup request
    $("#signUpBtn").click(function(e){
        e.preventDefault();
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        
        function validateEmail($email) {
            var emailReg = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
            return emailReg.test( $email );
          }



          var makePopup = '<div class="congrats_bg"><img src="../photos/congrats-bg.gif" alt=""></div><div class="fireworks_bg"><img src="../photos/fireworks.gif" alt=""></div><div class="lighting_bg"><img src="../photos/lighting-bg.gif" alt=""></div><div class="congrats_arrange"><div class="congrats_arrageWrap"> <div class="greeting_con"><b>Congratulation,</b></div><div id="greeting_name" class="greeting_name"><p></p></div><div class="grettion_status"><span>"We are thrilled to have you as a new member of our community. Our goal is to provide you with the best experience possible, and we hope that you will find everything you need here. Thank you<br> for joining us, and we look forward to seeing you around!"</span></div><div class="going_loginpage"><a href="../index.php">Login Now -> </a></div></div> </div>';







        if(name === '' && email === '' && password === ''){
            alert("Input fields are empty!");
            $("#name").focus();
        }else if(name === ''){
            alert("Please, Enter your name!");
            $("#name").focus();
        }else if(email === ''){
            alert("Please, Enter your email!");
            $("#email").focus();
        }else if(password === ''){
            alert("Please, Enter a strong password!");
            $("#password").focus();
        }else if(!validateEmail(email) || email.length < 13 ){
            alert("Please, Enter your valid email address!");
            $("#email").focus();
        }else if(password.length < 8){
            alert("Password must be 8 charecter!");
            $("#password").focus();
        }else{
            $.post("../php_function/signup_func.php",{name:name,email:email,password:password,signupBtn:"signupBtn"}, function(data){
                if(data === 'true'){
                    $(".congratulation_page").css("visibility","visible");
                    $(".congratulation_page").html($(makePopup));
                    // $(".greeting_name").text(name);
                    $(".greeting_name p").text(name);

                }else if(data === 'This email has already an account!'){
                    alert('This email has already an account!');
                }else{
                    alert('Something wrong!');
                }
            })
        }

    })





});//end document ready function