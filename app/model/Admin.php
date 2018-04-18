<?php
class Admin extends Database
{
  static protected $table_name = "admin";
  static protected $db_columns = [
    'id',
    'username',
    'password_hash',
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

   public $id;
   public $username;
   public $firstname;
   public $middlename;
   public $lastname;
   public $email;
   protected $password_hash;
   public $password;
   public $confirm_password;
   protected $password_required = true;

   public function login($username)
   {
     $result = self::$database->query("SELECT * FROM admin WHERE username='{$username}'");
     $fetch_data = $result->fetch(PDO::FETCH_ASSOC);
     return $fetch_data['username'];
   }

}
