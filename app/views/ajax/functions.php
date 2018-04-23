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

        }
    }

?>
