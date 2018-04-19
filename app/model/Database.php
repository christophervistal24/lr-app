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

    public function connect()
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
      $columns = $this->attributes();
      $sql =
      "
      INSERT INTO admins (" . join(",",$columns) . ")
      VALUES
      ('$values[username]','$values[password]','{time()}','0','$values[firstname]','$values[middlename]','$values[lastname]','$values[gender]','$values[birthday]','$values[email]','$values[image]');
      ";
      $result =  self::$database->query($sql);
      return $result;
    }

}

?>