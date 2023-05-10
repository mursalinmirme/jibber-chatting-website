// $(document).ready(function(){
//    var incoming_msg_id = $("#inputwrap").attr("name");
//    var outgoing_msg_id = $("#sendMsgBtn").attr("name");
//     setInterval(function(){
//     $.post("../php_function/notification_sound.php",{outgoing_msg_id:outgoing_msg_id},function(data){
//       if(data == 'notification_come'){
//          var audio = new Audio("../photos/notification.mp3");
//          audio.play();
//       }else if(data == 'there is no notification'){
//          console.log("no new messege available");
//       }
//       // alert(data);
//       // if(data != 0){
//       //    // const audio = new Audio("../photos/notification.mp3");
//       //    // audio.play();
//       //    alert(data);
//       // }

//    });
// },4000)
// })//end document ready function
$(document).ready(function(){
   var outgoing_msg_id = $("#sendMsgBtn").attr("name");
   var intervalId = setInterval(function(){
      $.post("../php_function/notification_sound.php", {outgoing_msg_id: outgoing_msg_id}, function(data){
         if(data > 0){
            var audio = new Audio("../photos/notification.mp3");
            audio.play();
            clearInterval(intervalId);
         }else if(data == 0){
            // var audio = new Audio("../photos/notification.mp3");
            // audio.play();
            // clearInterval(intervalId);
         }
      });
   }, 4000);
});