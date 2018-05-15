$(document).ready(function(){
    $('#changeUsername').validate({
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
                'username': {
                    required: true,
                    minlength: 5,
                    remote:{
                        url:"/../../evaluation/app/views/ajax/functions.php",
                        type:"POST",
                        dataType :"json",
                        data: {
                            username: function(){
                                return $("#username").val();
                            },
                            action: function(){
                                return 'check_username';
                            }
                        },
                    }
                },
                'username_password':{
                    required: true,
                    minlength: 8,
                     remote:{
                        url:"/../../evaluation/app/views/ajax/functions.php",
                        type:"POST",
                        dataType :"json",
                        data: {
                            password: function(){
                                return $("#password").val();
                            },
                            action: function(){
                                return 'check_password';
                            }
                        },
                    }
                },
            },
            messages: {
                'username': {
                    required: 'Please enter a username',
                    minlength:"Username must be minimum of {0} characters",
                    remote:$.validator.format("{0} is already exists")
                },
                'username_password':{
                 required: 'Please provide your current password',
                 remote:$.validator.format("Check your password")
                },

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
                        }
                    },
                });
                return false;
            }

    });
});