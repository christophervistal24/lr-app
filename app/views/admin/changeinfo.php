<?php extract($data['user_info']); ?>
<div class="block block-rounded block-themed">
   <!-- Chat Header -->
   <div class="js-chat-head block-content block-content-full block-sticky-options bg-gd-sea text-center c1">
      <img class="img-avatar img-avatar-thumb" src="../../public/assets/img/avatars/avatar1.jpg" alt="">
      <div class="font-w600 mt-15 mb-5 text-white text-capitalize"><?=$firstname . ' ' . substr($middlename,0,1) . '. ' . $lastname?></div>
   </div>
   <!-- END Chat Header -->
</div>
<div class="row">
   <div class="col-md-6">
      <!-- Single Chat #3 -->
      <div class="block block-rounded block-themed">
         <!-- Chat Header -->
         <div class="js-chat-head block-content block-content-full block-sticky-options bg-gd-dusk text-center font-w600 mt-15 mb-5 text-white">Change Personal Information<br>
            <small class="text-white">( Please type your password in order to change your information )</small>
         </div>
         <!-- END Chat Header -->
         <!-- Messages (demonstration messages are added with JS code at the bottom of this page) -->
         <div class="js-chat-talk block-content block-content-full text-wrap-break-word overflow-y-auto" data-chat-id="3">
            <form class="js-validation-bootstrap" action="" method="post">
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-firstname">Firstname *</label>
                  <div class="col-lg-8"><input type="text" class="form-control" id="val-firstname" name="val-firstname" placeholder="Enter a firstname" value="<?= $firstname ?>"></div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-middlename">Middlename *</label>
                  <div class="col-lg-8"><input type="text" class="form-control" id="val-middlename" name="val-middlename" placeholder="Enter a middlename" value="<?= $middlename ?>"></div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-lastname">Lastname *</label>
                  <div class="col-lg-8"><input type="text" class="form-control" id="val-lastname" name="val-lastname" placeholder="Enter a lastname" value="<?= $lastname ?>"></div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-email">Email *</label>
                  <div class="col-lg-8"><input type="text" class="form-control" id="val-email" name="val-email" placeholder="Your valid email.." value="<?= $email ?>"></div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="example-datepicker1">Birthday *</label>
                  <div class="col-lg-8"><input type="text" class="js-datepicker form-control" id="example-datepicker1" name="val-birthday" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="mm/dd/yy" placeholder="mm/dd/yy" value="<?= $birthday ?>"></div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-skill">Gender *</label>
                  <div class="col-lg-8">
                     <select class="form-control" id="val-skill" name="val-gender">
                        <option value="" disabled selected><?= $gender ?></option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                     </select>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-password">Password *</label>
                  <div class="col-lg-8"><input type="password" class="form-control" id="val-password" name="val-password" placeholder=""></div>
               </div>
               <div class="form-group row col-lg-8 ml-auto"><button type="submit" class="btn btn-alt-primary float-right">Submit</button></div>
            </form>
         </div>
      </div>
      <!-- END Single Chat #3 -->
   </div>
   <div class="col-md-6">
      <!-- Single Chat #3 -->
      <div class="block block-rounded block-themed">
         <!-- Chat Header -->
         <div class="js-chat-head block-content block-content-full block-sticky-options bg-gd-dusk text-center font-w600 mt-15 mb-5 text-white">Change Password<br>
            <small class="text-white">( Don't type your current password to new password field )</small>
         </div>
         <!-- END Chat Header -->
         <!-- Messages (demonstration messages are added with JS code at the bottom of this page) -->
         <div class="js-chat-talk block-content block-content-full text-wrap-break-word overflow-y-auto" data-chat-id="3">
            <form class="js-validation-bootstrap2" action="" method="post">
               <!--  <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-skill">Image</label>
                  <div class="col-8">
                  <label class="custom-file">
                  <input type="file" class="custom-file-input" id="example-file-input-custom" name="example-file-input-custom">
                  <span class="custom-file-control ">Browse</span>
                  </label>
                  </div>
                  </div> -->
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-password">New Password <span class="text-danger">*</span></label>
                  <div class="col-lg-8"><input type="password" class="form-control" id="val-password" name="val-password" placeholder="Choose a safe one.."></div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-confirm-password">Retype New Password <span class="text-danger">*</span></label>
                  <div class="col-lg-8"><input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="..and confirm it!"></div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-current-password">Current Password <span class="text-danger">*</span></label>
                  <div class="col-lg-8"><input type="password" class="form-control" id="val-current-password" name="val-current-password" placeholder="Your current password"></div>
               </div>
               <div class="form-group row col-lg-8 ml-auto"><button type="submit" class="btn btn-alt-primary float-right">Submit</button></div>
            </form>
         </div>
      </div>
      <!-- END Single Chat #3 -->
   </div>
</div>