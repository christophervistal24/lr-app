<?php extract($data['user_info']); ?>
<div class="block block-rounded block-themed">
   <div class="js-chat-head block-content block-content-full block-sticky-options bg-gd-sea text-center c1">
      <img id="change_info_img" class="img-avatar img-avatar-thumb" src="<?= APP['DOC_ROOT']?>public/assets/uploads/<?= $image ?>" alt="">
      <div class="font-w600 mt-15 mb-5 text-white text-capitalize" id="profile_name"><?=$firstname . ' ' . substr($middlename,0,1) . '. ' . $lastname?></div>
   </div>
</div>
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
<div class="row">
   <div class="col-md-6">
      <div class="block block-rounded block-themed">
         <div class="js-chat-head block-content block-content-full block-sticky-options bg-gd-dusk text-center font-w600 mt-15 mb-5 text-white">Change Personal Information & Profile picture<br>
            <small class="text-white">( Please type your password in order to change your information )</small>
         </div>
         <div class="js-chat-talk block-content block-content-full text-wrap-break-word overflow-y-auto" data-chat-id="3">
            <form id="changeInformation" action="" method="post" autocomplete="off">
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-firstname">Firstname *</label>
                  <div class="col-lg-8"><input type="text" class="form-control" id="val-firstname" name="firstname" placeholder="Enter a firstname" value="<?= $firstname ?>"></div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-middlename">Middlename *</label>
                  <div class="col-lg-8"><input type="text" class="form-control" id="val-middlename" name="middlename" placeholder="Enter a middlename" value="<?= $middlename ?>"></div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-lastname">Lastname *</label>
                  <div class="col-lg-8"><input type="text" class="form-control" id="val-lastname" name="lastname" placeholder="Enter a lastname" value="<?= $lastname ?>"></div>
               </div>
               <div class="form-group row" id="email-row">
                  <label class="col-lg-4 col-form-label" for="val-email">Email *</label>
                  <div class="col-lg-8">
                     <input type="text" class="form-control" disabled id="val-email" name="email" placeholder="Your valid email.." value="<?= $email ?>">
                  </div>
                  <div class="container">
                     <label for="#change_email" class="float-right"><input id="change_email" type="checkbox"><small> Change this email</small></label>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="example-datepicker1">Birthday *</label>
                  <div class="col-lg-8"><input type="text" class="js-datepicker form-control" id="example-datepicker1" name="birthday" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="mm/dd/yy" placeholder="mm/dd/yy" value="<?= $birthday ?>"></div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-skill">Gender *</label>
                  <div class="col-lg-8">
                     <select class="form-control" id="val-skill" name="gender">
                        <option value="female" <?= ($gender =='Female') ? 'selected' : null ; ?>>Female</option>
                        <option value="male"   <?= ($gender =='Male') ? 'selected' : null ; ?>>Male</option>
                     </select>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-password">Password *</label>
                  <div class="col-lg-8"><input type="password" class="form-control" id="val_password" name="password" placeholder=""></div>
               </div>
               <input type="hidden" value="_info" name="action">
               <div class="form-group row col-lg-8 ml-auto"><button type="submit" class="btn btn-alt-primary float-right">Change information</button></div>
            </form>
            <hr>
            <form id="changeProfile" action="" method="post" enctype="multipart/form-data" >
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="example-file-input-custom">Profile picture <span class="text-danger">*</span></label>
                  <div class="col-lg-8">
                     <input type="file" style="cursor: pointer;" class="custom-file-input" id="example-file-input-custom"  name="profile_picture"> <span class="custom-file-control">Browse</span>
                  </div>
                  <input type="hidden" value="_change_profile" name="action">
               </div>
               <div class="form-group row col-lg-8 ml-auto"><button type="submit" class="btn btn-alt-primary float-right">Change profile picture</button></div>
            </form>
         </div>
      </div>
   </div>
   <div class="col-md-6">
      <div class="block block-rounded block-themed">
         <div class="js-chat-head block-content block-content-full block-sticky-options bg-gd-dusk text-center font-w600 mt-15 mb-5 text-white">Change Password & Username<br>
            <small class="text-white">( Don't type your current password to new password field )</small>
         </div>
         <div class="js-chat-talk block-content block-content-full text-wrap-break-word overflow-y-auto" data-chat-id="3">
            <form id="changePassword" action="" method="post" autocomplete="off">
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="change_new_password">New Password <span class="text-danger">*</span></label>
                  <div class="col-lg-8"><input type="password" class="form-control" id="change_new_password" name="change_new_password" placeholder="Choose a safe one.."></div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="change_new_confirm_password">Re-type New Password<span class="text-danger"> *</span></label>
                  <div class="col-lg-8"><input type="password" class="form-control" id="change_new_confirm_password" name="change_new_confirm_password" placeholder="..and confirm it!"></div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="change_current_password">Current Password <span class="text-danger">*</span></label>
                  <div class="col-lg-8"><input type="password" class="form-control" id="change_current_password" name="change_current_password" placeholder="Your current password"></div>
               </div>
               <input type="hidden" value="_password_change" name="action">
               <div class="form-group row col-lg-8 ml-auto"><button type="submit" class="btn btn-alt-primary float-right">Change password</button></div>
            </form>
         </div>
         <hr>
         <div class="js-chat-talk block-content block-content-full text-wrap-break-word overflow-y-auto">
            <form id="changeUsername" action="" method="post" autocomplete="off">
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="username">New Username<span class="text-danger"> *</span></label>
                  <div class="col-lg-8"><input type="text" class="form-control" id="username" name="username" placeholder="Your new username"></div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="password">Current Password <span class="text-danger">*</span></label>
                  <div class="col-lg-8"><input type="password" class="form-control" id="password" name="username_password" placeholder="Password is need"></div>
               </div>
               <input type="hidden" name="action" value="_username_change">
               <div class="form-group row col-lg-8 ml-auto">
                  <input type="submit" class="btn btn-alt-primary float-right" value="Change Username">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>