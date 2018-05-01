<?php if (isset($_GET['email']) && isset($_GET['token'])): ?>
    <?php $type = 'password'; ?>
    <?php $name = 'new_password'; ?>
    <?php $title = 'New Password'; ?>
<?php else: ?>
    <?php $type = 'email'; ?>
    <?php $name = 'reminder-credential'; ?>
    <?php $title = 'Forgot Password'; ?>
<?php endif ?>
<div class="bg-body-dark bg-pattern" style="background-image: url('assets/img/various/bg-pattern-inverse.png');">
    <div class="row mx-0 justify-content-center">
        <div class="hero-static col-lg-6 col-xl-4">
            <div class="content content-full overflow-hidden">
                <!-- Header -->
                <div class="py-30 text-center">
                    <a class="link-effect font-w700" href="index.html">
                        <i class="si si-fire"></i>
                        <!-- <span class="font-size-xl text-primary-dark">SDSSU</span><span class="font-size-xl">base</span> -->
                        logo here
                    </a>
                    <h1 class="h4 font-w700 mt-30 mb-10">Don’t worry, we’ve got your back</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Please enter your username or email</h2>
                </div>
                <!-- END Header -->
                <!-- Reminder Form -->
                <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.js) -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-reminder" action="" method="post">
                    <div class="block block-themed block-rounded block-shadow">
                        <div class="block-header bg-gd-primary">
                            <h3 class="block-title"><?= $title; ?></h3>
                        </div>
                        <div class="block-content">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="text-capitalize" for="reminder-credential"><?php echo $type; ?></label>
                                    <input type="<?php echo $type; ?>" class="form-control" id="reminder-credential" name="<?php echo $name; ?>">
                                </div>
                            </div>
                            <?php if (isset($_GET['email']) && isset($_GET['token'])): ?>
                                        <input type="hidden" id="email" name="email" value="<?php echo $_GET['email']; ?>">
                                        <input type="hidden" id="token" name="token" value="<?php echo $_GET['token']; ?>">
                                        <input type="hidden"  name="action" value="change_password">
                            <?php endif ?>
                            <div class="form-group d-flex justify-content-center">
                                <img src="<?= APP['DOC_ROOT']; ?>/public/assets/imgloader/Infinity-1s-105px.gif" alt="Loader" id="infinite-loader" class="text-center" style="display:none;">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-alt-primary">
                                <i class="fa fa-asterisk mr-10"></i> Submit
                                </button>
                            </div>
                        </div>
                        <div class="block-content bg-body-light">
                            <div class="form-group text-center">
                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="login">
                                    <i class="fa fa-user text-muted mr-5"></i> Sign In
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END Reminder Form -->
            </div>
        </div>
    </div>
</div>

