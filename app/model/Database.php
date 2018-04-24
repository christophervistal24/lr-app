<?php
class Database
{
    const DB_NAME   = 'evaluation';
    const DB_SERVER = 'localhost';
    const DB_USER   = 'root';
    const DB_PASS   = '';
    protected static $database;
    protected static $table_name = "";
    protected static $db_columns = [];
    public $errors = [];


    public function __construct()
    {
       self::$database = new PDO('mysql:host='.self::DB_SERVER.';dbname='.self::DB_NAME.'', self::DB_USER,self::DB_PASS, array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
    }

    public function getInstance()
    {
      return self::$database;
    }

    public function create_new_record($values)
    {
      try {
          $result = self::$database
                    ->query("
               INSERT INTO " . static::$table_name . " (" . implode(",",array_keys($values)) . ")
               VALUES
               (" . "'". implode("','",array_values($values)) . "'" . ")
                    ");
          return (bool) $result;
      } catch (Exception $e) {
          die($e->getMessage());
      }
    }

    // Read Records
    protected static function get_values($value,$column,$retrieve = [])
    {
      try {
          $result = self::$database->query("
              SELECT " . implode(",",array_values($retrieve)) . "
              FROM " . static::$table_name . "
              WHERE " .$column."=
              '" . $value . "'
        ");
          $fetch_data = $result->fetch(PDO::FETCH_ASSOC);
          return $fetch_data;
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }

    // Update Record
    public static function update_record($data = [])
    {
      $cols = null;
      $no_of_rows = count($data);
        $i = 1;
        foreach ($data as $key => $value) {
            $cols .= $key. "='". $value . '\'';
            if($i !== $no_of_rows -1 && $i !== $no_of_rows)
            {
                $cols .= ',';
            }
            $i++;
        }
        try {
              $result =  self::$database->query('UPDATE ' . static::$table_name . ' SET '. $cols . ' ');
              return (bool) $result;
        } catch (Exception $e) {
          die($e->getMessage());
        }
    }

    // Prepare statement
    public function prepare()
    {

    }

}

?>