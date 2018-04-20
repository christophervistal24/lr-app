<?php
spl_autoload_register(function($class){
    require_once '../../model/' . $class .'.php';
});

$DB    = (new Database)->getInstance();
$Util  = new Utilities;
$Admin = new Admin;
$File  = new File;

    if(isset($_POST['action'])){
        $action = trim($_POST['action']);
        switch ($action) {

            case 'check_username':
               $username = $Util->e($_POST['username']);
               echo json_encode($Admin->find_by($username,'username') ? false : true);
             break;

            case 'check_email':
               $email = $Util->e($_POST['email']);
               echo json_encode($Admin->find_by($email,'email') ? false : true);
            break;

            case '_create':
                $File->validate($_FILES['image']);
                $output   = $Util->array_except($_POST, ['action','created_at']);
                $new_data = array_merge($output['admin'],['image'=>$_FILES['image']['name'],'created_at'=>time()]);
                if($Admin->create_new_user($new_data)){
                  echo json_encode(['success'=>true]);
                }else{
                  echo json_encode(['success'=>false]);
                }
            break;

          case 'forgot_password' :
           $pathInPieces = explode(DIRECTORY_SEPARATOR , __FILE__);
           include  $pathInPieces[0] . '/' . $pathInPieces[1] . '/' . $pathInPieces[2] .'/'. $pathInPieces[3]. '/app/libraries/phpmailer/PHPMailerAutoload.php';

           $email = $Util->e($_POST['email']);
           $fetch_email = $Admin->find_by($email,'email');
           if(!empty($fetch_email)){
              $result = $DB->query("SELECT id FROM admins WHERE email='$fetch_email'");
              $stmt = $result->fetch(PDO::FETCH_ASSOC);
              $forgot_id = $stmt['id'];
              if(!empty($forgot_id)){
                $token = uniqid(md5(rand(1,20)),true);
                $yesterday = (time() + 86400);
                $up_data = $DB->query("UPDATE forgot_password SET token = '$token',token_expire='$yesterday' WHERE user_id ='$forgot_id'");
                  $mailer = new PHPMailer();
                  $mailer->IsSMTP();
                  $mailer->Host = 'smtp.gmail.com:465';
                  $mailer->SMTPAuth = TRUE;
                  $mailer->Port = 465;
                  $mailer->mailer="smtp";
                  $mailer->SMTPSecure = 'ssl';
                  $mailer->IsHTML(true);
                  $mailer->SMTPOptions = array('ssl' => array(
                              'verify_peer' => false,
                              'verify_peer_name' => false,
                              'allow_self_signed' => true)
                              );
                  $mailer->Username = 'christophervistal24@gmail.com';
                  $mailer->Password = 'iwanttobecomeaprogrammer';
                  $mailer->From = 'admin@noreply.com';
                  $mailer->FromName = 'SDSSU (FES)';
                  $mailer->Body =
                  "
                    <p>Forgot your password?</p>
                    <p>We've received a request to reset the password for this email address.</p>
                    <p>To reset your password please copy and paste this URL into your browser (link expires in 24 hours)</p>
                    <b><a href=forgot?email=".$email."&token=".$token.">http://localhost/lr-app/public/page/forgot?email=".$email."&token=".$token."</a></b>
                    <p>This link takes you to a secure page where you can change your password.</p>
                    <p>If you don't want to reset your password, please ignore this message. Your password will not be reset.</p>
                    <p>---------------------------------</p>
                    <p>For general inquiries or to request support with your account, please email (EMAIL OF ADMIN)</p>
                    <p>---------------------------------</p>
                    <p>This message was sent by (NAME OF APP). Visit (LINK OF SITE) to learn more.</p>
                    <p>If you received this email by mistake or believe it is spam, please forward it to (SUPPORT EMAIL)</p>
                  ";
                  $mailer->Subject = 'Demonstration';
                  $mailer->AddAddress($email);
                  if($mailer->send()) {
                    echo json_encode(['success'=>true,'message'=>'Please check your email']);
                  }
              }
           }

          //first check if the username or email is exists and return some message
          //create a unique token and also update the token and the token expire and the database
          //add some phpmailer and also process the redirect to other links with token
          //pass the email and token in the url of the landing page that you redirect
          break;

          case 'change_password':
          $output       = $Util->array_except($_POST, ['action']);
          extract($output);
          $email        = $Util->e($email);
          $token        = $Util->e($token);
          $new_password = password_hash($new_password,PASSWORD_DEFAULT);
          $user_id = $DB->query("SELECT id,password FROM admins WHERE email='$email'")->fetch(PDO::FETCH_ASSOC);
          if(count($user_id) > 0){
              $id = $user_id['id'];
              $stmt = $DB->query("UPDATE admins JOIN forgot_password ON forgot_password.user_id = admins.id SET admins.password = '$new_password' , forgot_password.token = 0 , forgot_password.token_expire = 0 WHERE admins.id = '$id'");
              if($stmt){
                echo json_encode(['success'=>true,'message'=>'Successfully changed your password']);
              }
          }
          break;

        }
    }

?>
