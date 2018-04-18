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

   public function __construct($args = [])
   {
      // $this->username   = $args['username'] ?? '';
      // $this->firstname  = $args['firstname'] ?? '';
      // $this->middlename = $args['middlename'] ?? '';
      // $this->lastname   = $args['lastname'] ?? '';
      // $this->email      = $args['email'] ?? '';
      // $this->password   = $args['password'];
      // $this->confirm_password = $args['confirm_password'];
   }

   public function check($username)
   {
     $result = self::$database->query("SELECT id FROM admins WHERE username=$username");
     $fetch_data = $result->fetch(PDO::FETCH_ASSOC);
     return $fetch_data;
   }
}
