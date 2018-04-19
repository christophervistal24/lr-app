$(document).ready(function(){
    $('#createAccount').validate({
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
                'admin[username]': {
                    required: true,
                    minlength: 5,
                },
                'admin[email]': {
                    required: true,
                    email: true,
                },
                'admin[password]': {
                    required: true,
                    minlength: 8
                },
                'admin[confirm_password]': {
                    required: true,
                    equalTo: '#val-password',
                    minlength :8
                },
                'admin[firstname]': {
                    required: true,
                    minlength:5,
                },
                'admin[middlename]':{
                    required:true,
                    minlength:2,
                },
                'admin[lastname]':{
                    required:true,
                    minlength:5,
                },
                'admin[birthday]':{
                    required:true,
                },
                'admin[gender]':{
                    required:true,
                },
                 'admin[image]':{
                    required:true,
                }
            },
            messages: {
                'admin[username]': {
                    required: 'Please enter a username'
                },
                'admin[email]':{
                 required: 'Please enter a valid email address'
                },
                'admin[password]': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 8 characters long'
                },
                'admin[confirm_password]': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 8 characters long',
                    equalTo: 'Please enter the same password as above'
                },
                'admin[firstname]':{
                    required: 'Please enter firstname',
                    minlength: 'Your password must be at least 5 characters long',
                },
                'admin[middlename]':{
                    required:'Please enter middlename',
                    minlength:'Your middlename must be at least 2 characters long'
                },
                'admin[lastname]':{
                    required:'Please enter lastname',
                    minlength:'Your lastname must be at least 5 characters long'
                },
                'admin[birthday]':{
                    required:'Please choose your birthday'
                },
                'admin[gender]':{
                    required:'Please select gender',
                },
                 'admin[image]':{
                    required:'Please select gender',
                }
             },
              submitHandler: function(form){
                $.ajax({
                    url:'/../../lr-app/app/views/ajax/functions.php',
                    type:"post",
                    dataType:"json",
                    data:$(form).serialize(),
                    success:function(data){
                        if(data.success == true){
                            swal("Success!", "Successfully create new account", "success");
                            $(form)[0].reset();
                        }
                    },
                });
                return false;
            }

    });
});