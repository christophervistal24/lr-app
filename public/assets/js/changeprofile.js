/*jshint esversion:6*/
$(document).ready(function(){
    $('#changeProfile').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid');
                jQuery(e).remove();
            },
             rules: {
                'profile_picture':{
                    required:true,
                    accept: "image/jpg,image/jpeg,image/png,image/gif"
                }
            },
            messages: {
                'profile_picture':{
                    required:'Please attach some image',
                    accept: 'Image must be JPEG , JPG , PNG or GIF'
                }
             },
              submitHandler: function(form){
                  $.ajax({
                    url:'/../../lr-app/app/views/ajax/functions.php',
                    type:"POST",
                    dataType:"json",
                    data:new FormData(form),
                    processData : false,
                    contentType:false,
                    success:function(data){
                        if(data.success == true){
                            swal("Success!", data.message, "success");
                            $(form)[0].reset();
                            $('#change_info_img').attr('src','../../public/assets/uploads/' + data.img);
                            $('#sidebar_img').attr('src','../../public/assets/uploads/' + data.img);
                        }
                    },
                });
                return false;
            }

    });
});