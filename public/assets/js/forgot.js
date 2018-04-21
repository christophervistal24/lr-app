/*jshint esversion:6*/
/*
 *  Document   : op_auth_reminder.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Password Reminder Page
 */

var OpAuthReminder = function() {
    // Init Password Reminder Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationReminder = function(){
        jQuery('.js-validation-reminder').validate({
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
                'reminder-credential': {
                    required: true,
                    minlength: 3
                },
                'new_password' :{
                    required: true,
                    minlength: 8
                }
            },
            messages: {
                'reminder-credential': {
                    required: 'Please enter a valid credential'
                },
                'new_password': {
                    required: 'Please enter a password',
                    minlength:'Password must be minimum 8 characters',
                }
            },
              submitHandler: function(form){
                var input = $('#reminder-credential').val();
                if($('#reminder-credential').attr("name") == 'reminder-credential'){
                     $.ajax({
                            url:'/../../lr-app/app/views/ajax/functions.php',
                            type:"POST",
                            dataType:"json",
                            data:{email:input , action:'forgot_password'},
                            success:function(data){
                                if(data.success == true){
                                    swal("Success!",data.message, "success");
                                    $(form)[0].reset();
                                }
                            },
                        });
                return false;
                }else if($('#reminder-credential').attr("name") == 'new_password'){
                    var email = $("#email").val();
                    var token = $("#token").val();
                     $.ajax({
                            url:'/../../lr-app/app/views/ajax/functions.php',
                            type:"POST",
                            dataType:"json",
                            data:$(form).serialize(),
                            success:function(data){
                                if(data.success == true){
                                   swal({
                                      title: "Proceed to login page?",
                                      text: "Start loggin in with your new password",
                                      icon: "success",
                                      buttons: true,
                                      dangerMode: true,
                                    }).then((willDelete) => {
                                      if (willDelete) {
                                            window.location.href ='login';
                                      } else {
                                            window.location.href='forgot';
                                      }
                                    });
                                    $(form)[0].reset();
                                }else{
                                      swal({
                                      title: "Proceed to request page?",
                                      text: data.message,
                                      icon: "error",
                                      buttons: true,
                                      dangerMode: true,
                                    }).then((willDelete) => {
                                      if (willDelete) {
                                            window.location.href ='forgot';
                                      } else {
                                      }
                                    });
                                }
                            },
                        });
                return false;
                }
            }
        });
    };

    return {
        init: function () {
            // Init Password Reminder Form Validation
            initValidationReminder();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ OpAuthReminder.init(); });