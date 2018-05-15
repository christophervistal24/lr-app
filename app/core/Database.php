<?php
namespace App\Core;
use PDO;
class Database
{
  private $db , $dbHost='localhost', $dbName='evaluation', $dbUser='root',$dbPass='';

  public function getInstance()
  {
      $this->db = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName.";",$this->dbUser,$this->dbPass,[
      PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION , PDO::MYSQL_ATTR_FOUND_ROWS => true
    ]);
    return $this->db;
  }
}

?>