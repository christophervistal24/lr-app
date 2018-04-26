<?php
class Admin extends Database
{
  static protected $table_name = "admins";
  protected $Utilities;
  static protected $db_columns = [
    'id',
    'username',
    'password',
    'created_at',
    'updated_at',
    'firstname',
    'middlename',
    'lastname',
    'gender',
    'birthday',
    'email',
    'image',
   ];

   public function __construct()
   {
      $this->Utilities = $this->call_object('Utilities');
   }

   public function call_object($object_name)
   {
        return ($this->Utilities != null) ? $this->Utilities : new $object_name;
   }

   public function create_new_user($args = [])
   {
      $hashed_pass = $this->Utilities->set_hash($args);
      $record      = $this->Utilities->array_except($hashed_pass,['confirm_password']);
      if(parent::create_new_record($record)){
          $admin_id = self::$database->lastInsertId();
          $result   = self::$database
              ->exec("
               INSERT INTO forgot_password (user_id,token,token_expire)
               VALUES ('$admin_id','',0)
           ");
          return (bool) $result;
      }
   }

   public function is_user($items = [])
   {
      if($this->Utilities->is_post() && isset($items)){
        extract($items);
        $input_username = $this->Utilities->e($username);
        $input_password = $this->Utilities->e($password);
         // Retrieve some data check and also check if the username is exists
        $user_data = $this->find_by($input_username,'username',
        [
        'username','password','firstname','middlename','lastname',
        'gender','birthday','email','image','id'
        ]);
          if(isset($user_data['username']) && isset($input_password)){
             //validate the password input
              if(!$this->is_password_correct($input_password,$user_data['password'])){
                //error message here
              }else{
                $_SESSION['id'] = $user_data['id'];
                header("Location:dashboard");
              }
          }else{
            //error message here
          }
      }
   }

   public function find_by($value,$column,$retrieve = [])
   {
      return parent::get_values($value,$column,$retrieve);
   }

   public function is_password_correct($input_p,$fetch_password)
   {
       return password_verify($input_p,$fetch_password);
   }


}
