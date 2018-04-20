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
      /**
       *  columns username,email,password,firstname,middlename,lastname,birthday,gender,image
       *  values 'christopher','christophervistal24@gmail.com','$2y$10$ByVMXHwyimOfFYao/4iD/.A8Eny0nYPKXgQBCT6wa0rsAUq.sdU3G','christopher','platino','vistal','05/12/18','male','24463148_558681957799765_640822417_o.jpg'
       */
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

    public function find_by_username($username,$column)
    {
      $sql = "SELECT * FROM " . static::$table_name . " WHERE ".$column."='{$username}'";;
      $result = self::$database->query($sql);
      $fetch_data = $result->fetch(PDO::FETCH_ASSOC);
      return $fetch_data;
    }


}

?>