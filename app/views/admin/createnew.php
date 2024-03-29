<h2 class="content-heading">Form</h2>
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Create new </h3>
        <div class="block-options">
            <button type="button" class="btn-block-option">
            <i class="si si-wrench"></i>
            </button>
        </div>
    </div>
    <!-- If someone tries to disabled javascript to bypass validation -->
    <div class="container">
        <?php
        if (isset($data['error_message'])) {
                foreach ($data['error_message'] as $value) {
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <span><?= $value ?></span>
                </div>
                <?php
              }
        }
        ?>
    </div>
    <div class="block-content">
        <div class="row justify-content-center py-20">
            <div class="col-xl-6">
                <?= $this->post('username'); ?>
                <form id="createAccount" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="val-username">Username <span class="text-danger">*</span></label>
                        <div class="col-lg-8"><input type="text" class="form-control" id="val-username" name="username" placeholder="Enter a username.."></div>
                    </div>
                    <div class="form-group row"><label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                    <div class="col-lg-8"><input type="text" class="form-control" id="val-email" name="email" placeholder="Your valid email..">
                </div>
            </div>
            <div class="form-group row"><label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span></label>
            <div class="col-lg-8"><input type="password" class="form-control" id="val-password" name="password" placeholder="Choose a safe one.."></div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span></label>
            <div class="col-lg-8"><input type="password" class="form-control" id="val-confirm-password" name="confirm_password" placeholder="..and confirm it!"></div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="val-firstname">Firstname <span class="text-danger">*</span></label>
            <div class="col-lg-8"><input type="text" class="form-control" id="val-firstname" name="firstname" placeholder="Enter a firstname"></div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="val-middlename">Middlename <span class="text-danger">*</span></label>
            <div class="col-lg-8"><input type="text" class="form-control" id="val-middlename" name="middlename" placeholder="Enter a middlename"></div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="val-lastname">Lastname <span class="text-danger">*</span></label>
            <div class="col-lg-8"><input type="text" class="form-control" id="val-lastname" name="lastname" placeholder="Enter a lastname"></div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="example-datepicker1">Birthday <span class="text-danger">*</span></label>
            <div class="col-lg-8"><input type="text" class="js-datepicker form-control" id="example-datepicker1" name="birthday" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="mm/dd/yy" placeholder="mm/dd/yy"></div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="val-skill">Gender <span class="text-danger">*</span></label>
            <div class="col-lg-8"><select class="form-control" id="val-skill" name="gender">
                <option value="female">Female</option>
                <option value="male">Male</option>
            </select></div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="example-file-input-custom">Profile picture <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <input type="file" style="cursor: pointer;" class="custom-file-input" id="example-file-input-custom"  name="image"> <span class="custom-file-control">Browse</span>
            </div>
        </div>
        <div class="form-group row col-lg-8 ml-auto"><input value="Submit" type="submit" class="btn btn-alt-primary"></div>
        <input type="hidden" name="action" value="_create">
    </form>
</div>
</div>
</div>
</div>