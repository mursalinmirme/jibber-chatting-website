$("document").ready(function(){
    var subBtn = $("#saveChangeBtn");
       $("#file").on("change", function(e){
            var imageType = e.target.files[0].type;
               // console.log(imageType);
                     //console.log(e.target.files.length);

    if(imageType == "image/jpeg" || imageType == "image/jpg" || imageType == "image/png"){
        // alert("this image could be uploaded");
             var showImage = URL.createObjectURL(e.target.files[0]);
                var postImage = e.target.files;
                   console.log(showImage);
                       $("#profileImg").attr("src",showImage);

    if(e.target.files.length == 1){
        // alert("image selected.");
            $("#changeImageBtn").show();
            $("#changeInformation").hide();
                // $("#selectImageMsg").hide();
                    $("#saveChangeBtn").click(function(e){
                        e.preventDefault();
                            var formdata = new FormData();
                                var img = postImage;
                                   formdata.append("my_picture",img[0]);
                                       // console.log(formdata);
        $.ajax({
            url: "../php_function/uploadImg.php",
                type: "POST",
                   data:  formdata,
                     contentType: false,
                        cache: false,
                            processData:false,
                                success: function(data){
                                // alert(data);
                                    // location.reload(true);
                                    //  $(subBtn).hide();
                                        // $("#selectImageMsg").show();
                                        //    $("#selectImageMsg").text("Profile picture updated successfully");
                                            //    $("#selectImageMsg").css({"color":"green"});
                                            //    if(data === 'Profile Picture updated successfylly'){
                                                // setTimeout(function(){
                                                //     window.location.href = "home.php";
                                                // },1200);
                                                alert(data);
                                            //    }
                                }
                });

            });
        }

    }else{
        alert("Error! this files cannot be uploaded");
    }

  });//end change event function
});//end document.readyFunction
