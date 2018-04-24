/*jshint esversion:6*/
$(document).ready(function(){
         $('#change_email').change(function(){
             $('#val-email').prop('disabled', !$(this).is(':checked'));
             if($(this).is(":unchecked")){
                $('#email-row').removeClass('is-invalid');
             }
         });
    $('#changeInformation').validate({
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
                'email': {
                    required: true,
                    email: true,
                    remote:{
                        url:"/../../lr-app/app/views/ajax/functions.php",
                        type:"POST",
                        dataType :"json",
                        data: {
                            email: function(){
                                return $("#val-email").val();
                            },
                            action: function(){
                                return 'check_email';
                            }
                        },
                    }
                },
                'password': {
                    required: true,
                    minlength: 8
                },
                'confirm_password': {
                    required: true,
                    equalTo: '#val-password',
                    minlength :8
                },
                'firstname': {
                    required: true,
                    minlength:5,
                },
                'middlename':{
                    required:true,
                    minlength:2,
                },
                'lastname':{
                    required:true,
                    minlength:5,
                },
                'birthday':{
                    required:true,
                },
                'gender':{
                    required:true,
                },
            },
            messages: {
                'username': {
                    required: 'Please enter a username',
                    minlength:"Username must be minimum of {0} characters",
                    remote:$.validator.format("{0} is already exists")
                },
                'email':{
                 required: 'Please enter a valid email address',
                 remote:$.validator.format("{0} is already exists")
                },
                'password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 8 characters long'
                },
                'confirm_password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 8 characters long',
                    equalTo: 'Please enter the same password as above'
                },
                'firstname':{
                    required: 'Please enter firstname',
                    minlength: 'Your password must be at least 5 characters long',
                },
                'middlename':{
                    required:'Please enter middlename',
                    minlength:'Your middlename must be at least 2 characters long'
                },
                'lastname':{
                    required:'Please enter lastname',
                    minlength:'Your lastname must be at least 5 characters long'
                },
                'birthday':{
                    required:'Please choose your birthday'
                },
                'gender':{
                    required:'Please select gender',
                },
             },
              submitHandler: function(form){
                alert('Submit triggered');
                return false;
            }

    });
});