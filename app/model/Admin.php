<?php
class Admin extends Database
{
  static protected $table_name = "admins";

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

  /* public $id;
   public $firstname;
   public $middlename;
   public $lastname;
   public $username;
   public $email;
   public $gender;
   public $birthday;
   public $image;
   protected $utilities;*/

   public function __construct()
   {
      $this->utilities = new Utilities;
   }

   public function create_new_user($args = [])
   {
      $hashed_pass = $this->utilities->set_hash($args);
      $record      = $this->utilities->array_except($hashed_pass,['confirm_password']);
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


   // Add some extra security
   public function check($username,$input_password)
   {
        // if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // }
       // $user_data = $this->find_by_username($username,'username');
       // if(password_verify($input_password,$user_data['password'])){
       //    $new_user_data = $this->utilities->array_except($user_data,['password','created_at','updated_at']);
       //    $_SESSION['id'] = $new_user_data['id'];
       //    header("Location:dashboard");
       // }else{return;}
   }

   public function find_by($value,$column,$retrieve = [])
   {
      return parent::get_values($value,$column,$retrieve);
   }

}
