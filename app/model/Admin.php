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

   public $id;
   public $firstname;
   public $middlename;
   public $lastname;
   public $username;
   public $email;
   public $gender;
   public $birthday;
   public $image;
   protected $args = [];
   protected $utilities;

   public function __construct()
   {
      $this->utilities = new Utilities;
   }

   public function create_new_user($args = [])
   {
      $args = $this->utilities->array_except($args,['confirm_password']);
      $this->args = $this->set_hash($args);
      if(parent::create($this->args)){
        return true;
      }
   }


   // Add some extra security
   public function check($username,$input_password)
   {
       $user_data = $this->find_by_username($username);
       if(password_verify($input_password,$user_data['password'])){
          $new_user_data = $this->utilities->array_except($user_data,['password','created_at','updated_at']);
          $_SESSION['id'] = $new_user_data['id'];
          header("Location:dashboard");
       }else{
          echo "<script>
            $(document).ready(function(){
                swal('Message', 'Please check your username or password', 'error');
              });
          </script>";
       }
   }

   private function set_hash($array = [])
   {
      foreach ($array as $key => $value) {
        if ($key == 'password') {
            $array[$key] = password_hash($value,PASSWORD_BCRYPT);
        }
      }
      return $array;
   }
}
