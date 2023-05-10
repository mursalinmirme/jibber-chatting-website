$(document).ready(function(){
   // update user Information
   $("#saveInfoBtn").click(function(){
      var inputName = $("#inputName").val();
      var inputPhone = $("#inputPhone").val();
      var inputEmail = $("#inputEmail").val();
      var InputBio = $("#InputBio").val();
      var userIdcatch = $(this).attr("name");
      $.post("../php_function/updateInformation.php",{inputName:inputName,inputPhone:inputPhone,inputEmail:inputEmail,InputBio:InputBio,userIdcatch:userIdcatch,updatebtn:"updatebtn"},function(data){
         alert(data);
      });
      
   });

   // show user status and user list
   $(".usersList_Wrappper").html('<div class="loadingUsers"><span><i class="fa-solid fa-circle-notch fa-spin"></i></span></div>')
   setInterval(function(){
      $.post("../php_function/user_status.php",{getuserstatus:'getuserstatus'},function(data){
         // alert(data);
         if(!$(".search").hasClass("activeSearch"))
         $(".usersList_Wrappper").html(data);

      })
   },500);





// this code is written for search users
$("#search").keyup(function(){
   var searchText = $("#search").val();
   if(searchText != ""){
      $(".search").addClass("activeSearch");
      $.post("../php_function/search.php",{getsearchText:searchText},function(data){
         $(".usersList_Wrappper").html(data);
      })
   }else{
      $(".search").removeClass("activeSearch");

   }
})

// this code is written  for sending user active status
setInterval(function(){
   $.post("../php_function/user_active_status.php",function(data){
      console.log(data);
   })
},3000);


});//end of document ready function