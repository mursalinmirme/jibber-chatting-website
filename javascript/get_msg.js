$(document).ready(function(){

$("#messagearea").html('<div class="loadingMessege"><span><i class="fa-solid fa-circle-notch fa-spin"></i></span></div>');

setInterval(function(){
var incoming_msg_id = $("#inputwrap").attr("name");    
var outgoing_msg_id = $("#sendMsgBtn").attr("name");    
$.post("home_persials/get_msg.php",{incoming_msg_id:incoming_msg_id,outgoing_msg_id:outgoing_msg_id,requestSER:"requestSER"},function(data){
    $("#messagearea").html(data);
    if(!$(".container").hasClass("activeScroll")){
        scrollMessegeBottom();
    }

});
 },300);

$("#messagearea").on("mouseenter",function(){
    $(".container").addClass("activeScroll");
});
$("#messagearea").on("mouseleave",function(){
    $(".container").removeClass("activeScroll");
});

function scrollMessegeBottom(){
    var scroll=$('#messagearea');
    scroll.animate({scrollTop: scroll.prop("scrollHeight")});
}
});