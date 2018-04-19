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

   protected $args = [];

   public function __construct()
   {

   }

   public function create_new_user($args = [])
   {
      $this->args = $this->set_hash($args);
      if(parent::create($this->args)){
        return true;
      }
   }

  /* public function check($value,$column)
   {
          $result =  self::$database->query("SELECT " . $column . " FROM " . self::$table_name . " WHERE " . $column . " ='{$value}'");
          $stmt =  $result->fetch(PDO::FETCH_ASSOC);
          return $stmt[$column];
   }*/

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
