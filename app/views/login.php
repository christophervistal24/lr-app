<!-- '<?=APP['DOC_ROOT']?>public/assets/img/photos/land.jpg' -->
<!-- Page Content -->
<div class="bg-image">
    <div class="row mx-0 bg-black-op">
        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
            <div class="p-30 invisible" data-toggle="appear">
                <p class="font-size-h3 font-w600 text-white">
                </p>
            </div>
        </div>
        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear">
            <div class="content content-full">
                <!-- Header -->
                <div class="px-30 py-10">
                    <h1 class="h3 font-w700 mt-30 mb-10">Welcome to  <span class="font-size-xl text-dual-primary-dark">SDDSU</span><span class="font-size-xl text-primary"> ( F E S )</span></h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Please sign in</h2>
                </div>
                <!-- END Header -->
                <!-- Sign In Form -->
                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.js) -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form action="" method="POST">
                    <span class="text-danger text-center"><?php
                        if (isset($data['error_message'])) {
                            echo $data['error_message'][0];
                        }
                    ?></span>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="login-username"  required name="username"  autofocus="true">
                                <label for="login-username">Username</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="password" class="form-control"  id="login-password" required name="password">
                                <label for="login-password">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="login-remember-me" name="login-remember-me">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Remember Me</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                        <i class="si si-login mr-10"></i> Sign In
                        </button>
                        <div class="mt-30">
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="signup">
                                <i class="fa fa-plus mr-5"></i> Create Account
                            </a>
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="forgot">
                                <i class="fa fa-warning mr-5"></i> Forgot Password
                            </a>
                        </div>
                    </div>
                </form>
                <!-- END Sign In Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
