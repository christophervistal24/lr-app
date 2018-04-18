 <!-- Bootstrap Forms Validation -->
                    <h2 class="content-heading">Form</h2>
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Create new admin</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="row justify-content-center py-20">
                                <div class="col-xl-6">
                                    <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/be_forms_validation.js) -->
                                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                     <form class="js-validation-bootstrap" action="" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Username <span class="text-danger">*</span></label>
                                        <div class="col-lg-8"><input type="text" class="form-control" id="val-username" name="admin[val-username]" placeholder="Enter a username.."></div>
                                        </div>
                                         <div class="form-group row"><label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                            <div class="col-lg-8"><input type="text" class="form-control" id="val-email" name="admin[val-email]" placeholder="Your valid email..">
                                            </div>
                                        </div>
                                        <div class="form-group row"><label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span></label>
                                        <div class="col-lg-8"><input type="password" class="form-control" id="val-password" name="admin[val-password]" placeholder="Choose a safe one.."></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span></label>
                                        <div class="col-lg-8"><input type="password" class="form-control" id="val-confirm-password" name="admin[val-confirm-password]" placeholder="..and confirm it!"></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-firstname">Firstname <span class="text-danger">*</span></label>
                                        <div class="col-lg-8"><input type="text" class="form-control" id="val-firstname" name="admin[val-firstname]" placeholder="Enter a firstname"></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-middlename">Middlename <span class="text-danger">*</span></label>
                                        <div class="col-lg-8"><input type="text" class="form-control" id="val-middlename" name="admin[val-middlename]" placeholder="Enter a middlename"></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-lastname">Lastname <span class="text-danger">*</span></label>
                                        <div class="col-lg-8"><input type="text" class="form-control" id="val-lastname" name="admin[val-lastname]" placeholder="Enter a lastname"></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="example-datepicker1">Birthday <span class="text-danger">*</span></label>
                                        <div class="col-lg-8"><input type="text" class="js-datepicker form-control" id="example-datepicker1" name="admin[val-birthday]" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="mm/dd/yy" placeholder="mm/dd/yy"></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Gender <span class="text-danger">*</span></label>
                                        <div class="col-lg-8"><select class="form-control" id="val-skill" name="admin[val-gender]">
                                        <option value="" disabled selected>Please select</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                        </select></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="example-file-input-custom">Image (Optional) <span class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                            <label class="custom-file"><input type="file" class="custom-file-input" id="example-file-input-custom" name="example-file-input-custom"> <span class="custom-file-control">Browse</span></label></div>
                                        </div>
<div class="form-group row col-lg-8 ml-auto"><button type="submit" class="btn btn-alt-primary">Submit</button></div>
</form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Bootstrap Forms Validation -->
