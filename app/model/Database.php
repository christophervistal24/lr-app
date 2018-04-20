<?php
class Database
{
    const DB_NAME   = 'evaluation';
    const DB_SERVER = 'localhost';
    const DB_USER   = 'root';
    const DB_PASS   = '';
    public static $database;
    protected static $table_name = "";
    protected static $db_columns = [];
    public $errors = [];


    public function __construct()
    {
       self::$database = new PDO('mysql:host='.self::DB_SERVER.';dbname='.self::DB_NAME.'', self::DB_USER,self::DB_PASS);
    }

    public function getInstance()
    {
      return self::$database;
    }

    protected function attributes()
    {
      $attributes = [];
      foreach (static::$db_columns as $key => $value) {
        if($value === 'id'){continue;}
        $attributes[] = $value;
      }
      return $attributes;
    }

    public function create($values)
    {
      $sql =
      "
      INSERT INTO admins (" . implode(",",array_keys($values)) . ")
      VALUES
      (" . "'". implode("','",array_values($values)) . "'" . ")
      ";


      $result =  self::$database->query($sql);
      if($result){
        return true;
      }
    }

    public function find_by_username($username)
    {
      $sql = "SELECT * FROM " . static::$table_name . " WHERE username='{$username}'";;
      $result = self::$database->query($sql);
      $fetch_data = $result->fetch(PDO::FETCH_ASSOC);
      return $fetch_data;
    }


}

?>