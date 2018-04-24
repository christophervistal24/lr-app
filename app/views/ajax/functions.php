<?php
require_once dirname(__DIR__) . '../../init.php';
$DB = $database->getInstance();

    if(isset($_POST['action'])){
        $action = trim($_POST['action']);
        switch ($action) {

          case 'check_username':
             $username = $Util->e($_POST['username']);
             echo json_encode($Admin->find_by($username,'username',['username']) ? false: true);
          break;

          case 'check_email':
             $email = $Util->e($_POST['email']);
             echo json_encode($Admin->find_by($email,'email',['email']) ? false : true);
          break;

          case 'check_password':
            $data = $Util->array_except($_POST,'action');
            extract($data);
            $password = $Util->e($password);
            if(isset($_SESSION['id'])){
              //do some validation and check the password create some method
              $user_data = $Admin->find_by($_SESSION['id'],'id',['password']);
              //return if the password is correct or wrong
              echo json_encode(($Admin->is_password_correct($password,$user_data['password'])));
            }
          break;

          case 'change_check_password':
          $input_new_password = $Util->e($_POST['change_new_password']);
           if(isset($_SESSION['id'])){
              //do some validation and check the password create some method
              $user_data = $Admin->find_by($_SESSION['id'],'id',['password']);
              //return if the password is correct or wrong
              if( !$Admin->is_password_correct($input_new_password,$user_data['password']) ){
                echo json_encode(true);
              }else{
                echo json_encode(false);
              }
            }
          break;

          case '_create':
             $File->validate($_FILES['image']);
             $output   = $Util->array_except($_POST, ['action','created_at']);
             $new_data = array_merge($output['admin'],['image'=>$_FILES['image']['name'],'created_at'=>time()]);
             echo json_encode(($Admin->create_new_user($new_data) ?  ['success'=>true] :  ['success'=>false]));
          break;

          case 'forgot_password' :
           $email  = $Util->e($_POST['email']);
           extract($Util->get_token());
           $stmt = $DB->prepare('
                       UPDATE forgot_password SET token=:token,token_expire=:token_expiration
                       WHERE user_id = (SELECT id FROM admins WHERE email=:email)
            ');
           $stmt->execute([
              ':token'            => $token,
              ':token_expiration' => $token_expiration,
              ':email'            => $email,
           ]);
           $Util->send_email([
               'email'       =>'christophervistal24@gmail.com',
               'fetch_email' => $email,
               'token'       => $token,
               'password'    => 'iwanttobecomeaprogrammer',
          ]);
          break;

          case 'change_password':
          $output       = $Util->array_except($_POST, ['action']);
          extract($output);
          $email        = $Util->e($email);
          $token        = $Util->e($token);
          $new_password = password_hash($new_password,PASSWORD_DEFAULT);

          $stmt = $DB->prepare("
              UPDATE admins INNER JOIN forgot_password ON admins.id = forgot_password.user_id
              SET admins.password=:new_password , forgot_password.token =:token, forgot_password.token_expire = :token_expire
              WHERE (admins.email=:email AND (forgot_password.token_expire >= :current_t))
              ");

          $result = $stmt->execute([
            ':new_password' => $new_password,
            ':token'        => 0,
            ':token_expire' => 0,
            ':email'        => $email,
            ':current_t'    => time(),
          ]);


          $affected_rows =  $stmt->rowCount();
          if($affected_rows > 0){
             echo json_encode(['success'=>true,'message'=>'Successfully changed your password']);
          }else{
             echo json_encode(['success'=>false,'message'=>'Please do another request']);
          }
          break;

          case '_info' :
           $input_data = $Util->array_except($_POST,'action');
           extract($input_data);
           $user_data = $Admin->find_by($_SESSION['id'],'id',['password','email']);
           if(isset($email)){
            $user_email = $email;
           }else{
            $user_email = $user_data['email'];
           }
           if (isset($_SESSION['id']) && $Admin->is_password_correct($password,$user_data['password'])) {
               $result = $Admin->update_record([
                  'firstname'  => $Util->e($firstname),
                  'middlename' => $Util->e($middlename),
                  'email'      => $Util->e($user_email),
                  'lastname'   => $Util->e($lastname),
                  'birthday'   => $Util->e($birthday),
                  'gender'     => $Util->e($gender),
                  'updated_at' => time(),
                  'WHERE id'   => $Util->e($_SESSION['id']),
               ]);
               if($result){
                echo json_encode([
                  'success'=>true,
                  'message'=>'Successfully changed your personal information',
                  ]);
               }
           }else{
                echo json_encode(['success'=>false,'message'=>'Something wrong please check your information']);
           }
           break;

           case '_password_change':
            $data = $Util->array_except($_POST,'action');
            extract($data);
            $user_data = $Admin->find_by($_SESSION['id'],'id',['password','id']);
            if ($Admin->is_password_correct($change_current_password,$user_data['password'])) {
              //update password
              $result = $Admin->update_record([
                'password' => password_hash($change_new_password,PASSWORD_DEFAULT),
                'updated_at' => time(),
                'WHERE id' => $user_data['id'],
              ]);

              if ($result) {
                  echo json_encode([
                  'success'=>true,
                  'message'=>'Successfully changed your password',
                  ]);
              }
            }
           break;

           case '_username_change':
             $data = $Util->array_except($_POST,'action');
            extract($data);
            $user_data = $Admin->find_by($_SESSION['id'],'id',['password','id']);
            if ($Admin->is_password_correct($username_password,$user_data['password']) && isset($username)) {
              //update password
              $result = $Admin->update_record([
                'username'   => $username,
                'updated_at' => time(),
                'WHERE id'   => $user_data['id'],
              ]);

              if ($result) {
                  echo json_encode([
                  'success'=>true,
                  'message'=>'Successfully changed your username',
                  ]);
              }
            }
           break;

        }
    }

?>
