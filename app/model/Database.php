<?php
class Database
{
    const DB_NAME   = 'evaluation';
    const DB_SERVER = 'localhost';
    const DB_USER   = 'root';
    const DB_PASS   = '';
    public static $database;
    protected static $table_name = "";
    protected $column = [];
    public $errors = [];



    public function __construct()
    {
       self::$database = new PDO('mysql:host='.self::DB_SERVER.';dbname='.self::DB_NAME.'', self::DB_USER,self::DB_PASS);
    }


    public static function find_by_sql($sql)
    {
        $result = self::$database->query($sql);
        if(!$result){
            exit("Database query Falied");
        }

        $object_arry = [];
        while($record = $result->fetch(PDO::FETCH_ASSOC)){
            $object_array[] = static::instantiate($record);
        }

        return $object_array;
    }

    protected static function instantiate($record)
    {
    $object = new static;
    // Could manually assign values to properties
    // but automatically assignment is easier and re-usable
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
        return $object;
    }

    public static function find_all()
    {
        $sql = 'SELECT * FROM' . static::$table_name;
        return static::find_by_sql($sql);
    }

    public static function count_all()
    {
        $sql = "SELECT COUNT(*) FROM " . static::$table_name;
        $result_set =  self::$database->query($sql);
        $row        = $result_set->fetch(PDO::FETCH_ASSOC);
        return array_shift($row);
    }

    public static function find_by_id($id)
    {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE id='" . self::$database->quote($id) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
        return array_shift($obj_array);
        } else {
        return false;
        }
    }

        protected function validate()
        {
        $this->errors = [];

        // Add custom validations

        return $this->errors;
        }

     protected function create()
     {
      $this->validate();
      if(!empty($this->errors)) { return false; }
      $attributes = $this->sanitized_attributes();
      $sql = "INSERT INTO " . static::$table_name . " (";
      $sql .= join(', ', array_keys($attributes));
      $sql .= ") VALUES ('";
      $sql .= join("', '", array_values($attributes));
      $sql .= "')";
      $result = self::$database->query($sql);
      if($result) {
      $this->id = self::$database->insert_id;
      }
      return $result;
      }

       protected function update()
       {
        $this->validate();
        if(!empty($this->errors)) { return false; }

        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach($attributes as $key => $value) {
          $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= " WHERE id='" . self::$database->quote($this->id) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
        }


      public function save() {
        // A new record will not have an ID yet
        if(isset($this->id)) {
          return $this->update();
        } else {
          return $this->create();
        }
      }

      public function merge_attributes($args=[]) {
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
          }
        }
      }

      // Properties which have database columns, excluding ID
      public function attributes() {
        $attributes = [];
        foreach(static::$db_columns as $column) {
          if($column == 'id') { continue; }
          $attributes[$column] = $this->$column;
        }
        return $attributes;
      }

      protected function sanitized_attributes() {
        $sanitized = [];
        foreach($this->attributes() as $key => $value) {
          $sanitized[$key] = self::$database->quote($value);
        }
        return $sanitized;
      }

      public function delete() {
        $sql = "DELETE FROM " . static::$table_name . " ";
        $sql .= "WHERE id='" . self::$database->quote($this->id) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;

        // After deleting, the instance of the object will still
        // exist, even though the database record does not.
        // This can be useful, as in:
        //   echo $user->first_name . " was deleted.";
        // but, for example, we can't call $user->update() after
        // calling $user->delete().
      }




}

?>