<?php
namespace App\Core;
use App\Core\Functions;
use Violin\Violin;
use PDO;

class Validation extends Violin
{
    use Functions;

    private $db;
    private $is_exists;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

//for login username
   protected function validate_usernameCheck($value,$input)
   {
      $stmt = $this->db->prepare("
        SELECT id , username as is_exists FROM admins WHERE username = :username
      ");
      $stmt->execute(['username' => $value]);
      $result = $stmt->fetch(PDO::FETCH_OBJ);
      $this->is_exists  = (empty($result->id)) ? false : $result->id;
      return $this->is_exists;
   }

//for login password
   protected function validate_passwordCheck($value,$input)
   {
     if ($this->is_exists) {
        $stmt = $this->db->prepare("
          SELECT password FROM admins WHERE id = :id
        ");
        $stmt->execute(['id' => $this->is_exists]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return ($result->password && Functions::check_password($value,$result->password)) ? $_SESSION['id'] = $this->is_exists : false;
      }
   }


   public function validate_isUsernameUnique($value,$input)
   {
        return (!$this->validate_usernameCheck($value,$input)) ? true : false;
   }

   public function validate_isPasswordCorrect($value,$input)
   {
      $stmt = $this->db->prepare("
          SELECT password FROM admins WHERE id = :id
        ");
        $stmt->execute(['id' => $_SESSION['id']]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return ($result->password && Functions::check_password($value,$result->password)) ? true : false;
   }


   protected function validate_isImage($value,$input,$args)
   {
      return in_array($value,$args);
   }


   public function validate_items(array $fields)
   {
      switch ($fields['action']) {
        case '_info':
        //validation for change personal information in change info page
            $data_and_rules = [
                'data' => [
                        'firstname|Firstname'         => $this->post('firstname'),
                        'middlename|Middlename'       => $this->post('middlename'),
                        'lastname|Lastname'           => $this->post('lastname'),
                        'birthday|Birthday'           => $this->post('birthday'),
                        'password|Password'           => $this->post('password'),
                ],

                'rules' => [
                       'firstname'    => 'required|min(5)',
                       'middlename'   => 'required|min(2)',
                       'lastname'     => 'required|min(2)',
                       'birthday'     => 'required',
                       'password'     => 'required|isPasswordCorrect|min(8)',
                ]
            ];
            return $this->isValid($data_and_rules,$fields['action']);
          break;

        case '_change_profile':
        //validation for change profile picture in change info page
             $data_and_rules = [
                'data' => [
                    'type|Image' => $this->file('profile_picture','type'),
                 ],

                 'rules' => [
                    'type' => 'required|isImage(image/png,image/jpg,image/jpeg,image/gif)',
                 ]
             ];
             return $this->isValid($data_and_rules,$fields['action']);
          break;

        case '_password_change':
        //validation for change password in change info page
            $data_and_rules = [
                'data' => [
                       'change_new_password|New password'                 => $this->post('change_new_password'),
                       'change_new_confirm_password|Re-type new password' => $this->post('change_new_confirm_password'),
                       'change_current_password|Current password'         => $this->post('change_current_password'),

                ],

                'rules' => [
                       'change_new_password'         => 'required|min(8)',
                       'change_new_confirm_password' => 'required|matches(change_new_password)|min(8)',
                       'change_current_password'     => 'required|isPasswordCorrect',
                ]
            ];
            return $this->isValid($data_and_rules,$fields['action']);
          break;

        case '_username_change':
        //validation for change username in change info page
           $data_and_rules = [
                'data' => [
                       'username|Username'          => $this->post('username'),
                       'username_password|Password' => $this->post('username_password'),
                ],

                'rules' => [
                       'username'          => 'required|isUsernameUnique|min(5)',
                       'username_password' => 'required|isPasswordCorrect|min(8)'
                ]
            ];
            return $this->isValid($data_and_rules,$fields['action']);
          break;

        case '_create':
          break;

        case 'login':
        //validation for login page
            $data_and_rules = [
                'data' => [
                       'username|Username' => $this->post('username'),
                       'password|Password' => $this->post('password'),
                ],

                'rules' => [
                       'username' => 'required|usernameCheck',
                       'password' => 'required|passwordCheck'
                ]
            ];
            return $this->isValid($data_and_rules,$fields['action']);
          break;
      }
   }

   private function isValid(array $data_and_rules , string $action) : array
   {
      call_user_func_array([$this,$action . 'Rules'], []);
      $data  = $data_and_rules['data'];
      $rules = $data_and_rules['rules'];
      $this->validate($data,$rules);
      return $this->errors()->all();
   }


   private function loginRules()
   {
      Violin::addRuleMessage('usernameCheck','Please check your username or password');
      Violin::addRuleMessage('passwordCheck','Please check your username or password');
   }

   private function _username_changeRules()
   {
      Violin::addRuleMessage('isUsernameUnique','Username already exists');
      Violin::addRuleMessage('isPasswordCorrect','Please check your password');
   }

   private function _infoRules()
   {
      Violin::addRuleMessage('isPasswordCorrect','Please check your password');
   }

   private function _password_changeRules()
   {
      Violin::addRuleMessage('isPasswordCorrect','Please check your password');
      Violin::addRuleMessage('matches', 'Retype password must be match with new password');
   }

   private function _change_profileRules()
   {
      Violin::addRuleMessage('isImage', 'Filetype is invalid');
   }

}