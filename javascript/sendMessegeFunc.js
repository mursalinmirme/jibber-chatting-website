$(document).ready(function(){
    $("#sendMsgBtn").click(function(e){
        e.preventDefault();
        var text = $("#text").val();
        if($("#text").val() === ''){
            
        }else{
            var messegefrom_id = $(this).attr("name");
            var messegeto_id = $(this).parent(".inputwrap").attr("name");
            $.post("../php_function/sendMessegeFunc.php",{text:text,messegefrom_id:messegefrom_id,messegeto_id:messegeto_id,sendBtn:'sendBtn'},function(data){
                $("#text").val('');
            });
         };
    });
});