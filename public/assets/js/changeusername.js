/*jshint esversion:6*/
      $('#changeUsername').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: (error, e) => {
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
                'username': {
                    required: true,
                    minlength: 5,
                    remote:{
                        url:"/../../evaluation/app/views/ajax/admin_functions.php",
                        type:"POST",
                        dataType :"json",
                        data: {
                            username: () => { return $('#username').val(); },
                            action:   () => { return 'check_username'; }
                        },
                    }
                },
                'username_password':{
                    required: true,
                    remote:{
                        url:"/../../evaluation/app/views/ajax/admin_functions.php",
                        type:"POST",
                        dataType :"json",
                        data: {
                            password: () => { return $('#password').val(); },
                            action:   () => { return 'check_password'; }
                        },
                    }
                }
            },
            messages: {
                'username': {
                    required: 'Please enter a username',
                    minlength:"Username must be minimum of {0} characters",
                    remote:$.validator.format('{0} is already exists')
                },
                'username_password':{
                    required: 'Please provide your current password',
                    remote:"Incorrect password"
                }
             },
              submitHandler: (form) => {
                $.ajax({
                    url:'/../../evaluation/app/views/ajax/admin_functions.php',
                    method :'POST',
                    dataType:'json',
                    data:$(form).serialize(),
                    success:(data) => {
                        if (data.success == true) {
                             swal("Success!", data.message , "success");
                             $(form)[0].reset();
                        }
                    },
                });
            }
    });
