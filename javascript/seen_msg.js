$(document).ready(function(){
    // this code is written for testing
//  does seen messege function working or not

// function seen_messege(){
//    $.post("../php_function/seen_messege.php",{messege_receiver_id:messege_receiver_id},function(data){
//       alert(data);
//    })
// }
var incoming_msg_id = $("#inputwrap").attr("name");
var outgoing_msg_id = $("#sendMsgBtn").attr("name");
setInterval(function(){
   // seen_messege();
   $.post("../php_function/seen_messege.php",{incoming_msg_id:incoming_msg_id,outgoing_msg_id:outgoing_msg_id},function(data){
    //   alert(data);

   });
},100)

});