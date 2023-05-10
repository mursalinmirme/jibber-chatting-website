$(document).ready(function(){
    $("#loginbutton").click(function(e){
       e.preventDefault();
       var email = $("#email").val();
       var password = $("#password").val();
       if(email === ''){
        alert("Please, enter your email!");
       }else if(password === ''){
        alert("Please, enter your password!");
       }else{
        $.post("php_function/loginfunc.php",{email:email,password:password,loginBtn:'loginBtn'},function(data){
            if(data === 'true'){
                window.location.href = "php/home.php";
            }else if(data === 'false'){
                alert("wrong password!");
            }else{
                alert(data);
            }
        });
       }
    })
});