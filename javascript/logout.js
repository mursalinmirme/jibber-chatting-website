$(document).ready(function(){
    $("#logOutBtn").click(function(){
        var logoutconfirm = confirm("Do you want to logout now?");
        if(logoutconfirm === true){
            $.post("../php_function/logout.php",{logOutBtn:"logOutBtn"},function(data){
                if(data === 'logoutsuccessfully'){
                    window.location.href = "../index.php";
                }
            });
        }else{
            alert("Thank you for connected with us");
        }

    })
});