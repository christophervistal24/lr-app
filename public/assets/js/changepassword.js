/*jshint esversion:6*/
$(document).ready(function(){
    $('#changePassword').validate({
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
                'change_current_password': {
                    required: true,
                    minlength: 8,
                     remote:{
                        url:"/../../evaluation/app/views/ajax/functions.php",
                        type:"POST",
                        dataType :"json",
                        data: {
                            password: function(){
                                return $("#change_current_password").val();
                            },
                            action: function(){
                                return 'check_password';
                            }
                        },
                    }
                },
                'change_new_password':{
                    required : true,
                    minlength : 8,
                     remote:{
                        url:"/../../evaluation/app/views/ajax/functions.php",
                        type:"POST",
                        dataType :"json",
                        data: {
                            password: function(){
                                return $("#change_new_password").val();
                            },
                            action: function(){
                                return 'change_check_password';
                            }
                        },
                    }
                },
                'change_new_confirm_password':{
                    required : true,
                    minlength : 8,
                    equalTo: '#change_new_password',
                },
            },
            messages: {
                'change_current_password':{
                 required: 'Please enter your current password',
                 remote:$.validator.format("Please check your password")
                },

                'change_new_password': {
                 required: 'Please enter your new password',
                 minlength: 'Your password must be at least 8 characters long',
                 remote:$.validator.format("Please don't type your current password"),
                },

                'change_new_confirm_password':{
                    required: 'Re-type password is required',
                    minlength: 'Your password must be at least 8 characters long',
                    equalTo : 'Re-type password must be matched at new password',
                }

             },
              submitHandler: function(form){
                 $.ajax({
                    url:'/../../evaluation/app/views/ajax/functions.php',
                    type:"POST",
                    dataType:"json",
                    data:$(form).serialize(),
                    success:function(data){
                        if(data.success == true){
                            swal("Success!", data.message, "success");
                            $(form)[0].reset();
                        }else{
                            swal("Error!","Something wrong please check your information or email us", "error");
                        }
                    },
                });
                return false;
            }

    });
});