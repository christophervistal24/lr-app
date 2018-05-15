<?php
namespace App\Core;
use App\Core\Functions;
use Violin\Violin;
use PDO;

class Validation extends Violin
{
    use Functions;

    private $db;
    private $user_id = null;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    //for login username method
   protected function validate_isUsernameAccepted($value,$input)
   {
        $stmt   = $this->db->prepare("SELECT id FROM admins WHERE username = :username");
        $stmt->execute([ 'username' => $value ]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        if (empty($result->id)) {
            return false;
        }
        $this->user_id = $result->id;
        return true;
   }

   //for login password method
   protected function validate_isPasswordCorrect($value,$input)
   {
        $stmt   = $this->db->prepare("SELECT password FROM admins WHERE id = :id");
        $stmt->execute([ 'id' => $this->user_id]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        if (!empty($result->password) && Functions::check_password($value,$result->password)) {
            $_SESSION['id'] = $this->user_id;
            return true;
        }
        return false;
   }


   protected function validate_infoCheckPassword($value,$input)
   {
      $stmt   = $this->db->prepare("SELECT password FROM admins WHERE id = :id");
        $stmt->execute([ 'id' => $_SESSION['id']]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        if (!empty($result->password) && Functions::check_password($value,$result->password)) {
            return true;
        }
        return false;
   }

   public function validate_items(array $fields)
   {
      switch ($fields['action']) {
        case '_info':
            //set data and rules here inside case
            return $this->changeInfoValidate($fields);
          break;

        case '_change_profile':
            return $this->changeProfileValidate($fields);
          break;

        case '_password_change':
            return $this->changePasswordValidate($fields);
          break;

        case '_username_change':
            return $this->changeUsernameValidate($fields);
          break;

        case '_create':
            return $this->createNewAdminValidate($fields);
          break;
      }
   }

   private function changeInfoValidate(array $fields)
   {
      unset($fields['action']);
      extract($fields);
      Violin::addRuleMessage('infoCheckPassword','Please check your password');
      $this->validate([
        'firstname|Firstname'   => [$firstname,'required|min(5)'],
        'middlename|Middlename' => [$middlename,'required|min(2)'],
        'lastname|Lastname'     => [$lastname,'required|min(2)'],
        'birthday|Birthday'     => [$birthday,'required'],
        'password|Password'     => [$password,'required|infoCheckPassword|min(8)'],
      ]);

       return $this->errors()->all();
   }

   private function changePasswordValidate(array $fields)
   {
      unset($fields['action']);
      extract($fields);
      Violin::addRuleMessage('infoCheckPassword','Please check your password');
      $this->validate([
        'change_new_password|Change New password'      => [$change_new_password,'required|min(8)'],
        'change_new_confirm_password|Re-type password' => [$change_new_confirm_password,'required|matches(change_new_password)|min(8)'],
        'change_current_password|Current password'     => [$change_current_password,'required|infoCheckPassword|min(8)'],
      ]);

       return $this->errors()->all();
   }

   private function changeUsernameValidate(array $fields)
   {
      unset($fields['action']);
      extract($fields);
      Violin::addRuleMessage('isUsernameAccepted','Please check your password');
      Violin::addRuleMessage('infoCheckPassword','Please check your password');
      $this->validate([
          'username|Username'          => [$username,'required|min(5)'],
          'username_password|Password' => [$username_password,'required|min(8)'],
      ]);

      return $this->errors()->all();
   }

   protected function validate_isImage($value,$input,$args)
   {
      return in_array($value,$args);
   }

   private function changeProfileValidate(array $fields)
   {
      unset($fields['action']);
      extract($fields['profile_picture']);
      Violin::addRuleMessage('isImage','Not image!');
      $this->validate([
          'type|Image' => [$type,'required|isImage(image/png,image/jpg,image/jpeg,image/gif)'],
      ]);
      return $this->errors()->all();
   }

   private function createNewAdminValidate(array $fields)
   {
      print_r($fields);
   }



}