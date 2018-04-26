<?php
 require_once   LR_APP . '/app/libraries/vendor/autoload.php';

class Utilities extends Violin\Violin
{

    // Check if the request is POST
    public function is_post()
    {
      return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    // Escaping characters to prevent SQL Injection attack
    public static function e($data)
    {
        return htmlspecialchars(trim(stripslashes(strip_tags($data))));
    }

    // Delete some element in a array
    public function array_except($array,$keys)
    {
        return array_diff_key($array, array_flip((array) $keys));
    }

    public function set_hash($array = [])
    {
      foreach ($array as $key => $value) {
        if ($key == 'password') {
            $array[$key] = password_hash($value,PASSWORD_BCRYPT);
        }
      }
      return $array;
   }

   public function token_csrf()
   {
      return bin2hex(random_bytes(32));
   }

   public function get_token()
   {
      $token = $this->token_csrf();
      $token_expiration = (time() + 86400);
      return [
        'token' => $token,
        'token_expiration' => $token_expiration
      ];
   }

   public function send_email($data = [])
   {
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
      $mailer->Username = $data['email'];
      $mailer->Password = $data['password'];
      $mailer->From = 'admin@noreply.com';
      $mailer->FromName = 'SDSSU (FES)';
      $mailer->Body =
        "
        <p>Forgot your password?</p>
        <p>We've received a request to reset the password for this email address.</p>
        <p>To reset your password please copy and paste this URL into your browser (link expires in 24 hours)</p>
        <b><a href=forgot?email=".$data['fetch_email']."&token=".$data['token'].">http://localhost/lr-app/public/page/forgot?email=".$data['fetch_email']."&token=".$data['token']."</a></b>
        <p>This link takes you to a secure page where you can change your password.</p>
        <p>If you don't want to reset your password, please ignore this message. Your password will not be reset.</p>
        <p>---------------------------------</p>
        <p>For general inquiries or to request support with your account, please email (EMAIL OF ADMIN)</p>
        <p>---------------------------------</p>
        <p>This message was sent by (NAME OF APP). Visit (LINK OF SITE) to learn more.</p>
        <p>If you received this email by mistake or believe it is spam, please forward it to (SUPPORT EMAIL)</p>
        ";
        $mailer->Subject = 'SDSSU (FES)';
        $mailer->AddAddress($data['fetch_email']);
        if($mailer->send()) {
          echo json_encode(['success'=>true,'message'=>'Please check your email']);
        }
   }

}
?>