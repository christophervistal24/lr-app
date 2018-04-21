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
           $result = $DB->query("
                       UPDATE forgot_password SET token = '$token', token_expire = '$token_expiration' WHERE user_id = (SELECT id FROM admins WHERE email='$email')
            ");
            $Util->send_email(
                    [
                    'email'       =>'christophervistal24@gmail.com',
                    'fetch_email' => $email,
                    'token'       => $token,
                    'password'    => 'iwanttobecomeaprogrammer',
                    ]
           );
          break;

          case 'change_password':
          $output       = $Util->array_except($_POST, ['action']);
          extract($output);
          $email        = $Util->e($email);
          $token        = $Util->e($token);
          $new_password = password_hash($new_password,PASSWORD_DEFAULT);
          $user = $DB->query("SELECT admins.id,forgot_password.token_expire FROM admins INNER JOIN forgot_password ON admins.id = forgot_password.user_id WHERE admins.email='$email'
                                ")->fetch(PDO::FETCH_ASSOC);
          if(count($user) > 0){
              $id = $user['id'];
              $date = $user['token_expire'];
              if(time() >= $date){
                  echo json_encode(['success'=>false,'message'=>'Please request another forgot password']);
              }else{
                 $stmt = $DB->query("UPDATE admins JOIN forgot_password ON forgot_password.user_id = admins.id SET admins.password = '$new_password' , forgot_password.token = 0 , forgot_password.token_expire = 0 WHERE admins.id = '$id'");
                  if($stmt){
                    echo json_encode(['success'=>true,'message'=>'Successfully changed your password']);
                  }
              }

          }
          break;

        }
    }

?>
