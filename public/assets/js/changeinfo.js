/*jshint esversion:6*/
$(document).ready(() => {
 $('#change_email').change(function(){
             $('#val-email').prop('disabled', !$(this).is(':checked'));
             if($(this).is(":unchecked")){
                $('#email-row').removeClass('is-invalid');
             }
         });
    $('#changeInformation').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: (error, e)  => {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: (e) => {
                jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: (e) => {
                jQuery(e).closest('.form-group').removeClass('is-invalid');
                jQuery(e).remove();
            },
        rules: {
                'email': {
                    required: true,
                    email: true,
                    remote:{
                        url:"/../../evaluation/app/views/ajax/admin_functions.php",
                        type:"POST",
                        dataType :"json",
                        data: {
                            email:  () => { return $("#val-email").val();},
                            action: () => { return 'check_email'; }
                        },
                    }
                },
                'password': {
                    required: true,
                    minlength: 8,
                    remote:{
                        url:"/../../evaluation/app/views/ajax/admin_functions.php",
                        type:"POST",
                        dataType :"json",
                        data: {
                            password: () => { return $("#val_password").val(); },
                            action:   () => { return 'check_password'; }
                        },
                    }
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
                    minlength:2,
                },
                'birthday':{
                    required:true,
                },
                'gender':{
                    required:true,
                },
            },
            messages: {
                'email':{
                 required: 'Please enter a valid email address',
                 remote:$.validator.format("{0} is already exists")
                },
                'password': {
                 required: 'Please provide a password',
                 minlength: 'Your password must be at least 8 characters long',
                 remote:$.validator.format("Please check your password"),
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
              submitHandler: (form) => {
                 $.ajax({
                    url:'/../../evaluation/app/views/ajax/admin_functions.php',
                    type:"POST",
                    dataType:"json",
                    data:$(form).serialize(),
                    success: (data) => {
                        if(data.success == true){
                            swal("Success!", data.message, "success");
                            $('#val_password').val('');
                            $('#val-email').removeAttr("disabled");
                            $('#val-email').val(data.email);
                            $('#val-email').attr("disabled");
                            $('#side_overlay_name').html(data.firstname + ' ' + data.lastname);
                            $('#top_right_name').html(data.lastname + ' , ' + data.firstname + '<i class="fa fa-angle-down ml-5"></i>');
                            $('#sidebar_name').html(data.firstname + ' ' + data.middlename.substr(0,1) + '. ' + data.lastname);
                            $('#profile_name').html(data.firstname + ' ' + data.middlename.substr(0,1) + '. ' + data.lastname);
                        }
                    },
                });
                return false;
            }

});

});
