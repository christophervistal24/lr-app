<?php
namespace App\Core;
use App\Core\ICRUD;
use App\Core\Functions;
use App\Core\QueryResult;

class CRUD implements ICRUD
{
    use Functions;

    private $db;
    private $queryResult;

    public function __construct()
    {
        $this->db          = (new Database)->getInstance();
        $this->queryResult = new QueryResult;

    }

    public function create(array $sql = []) : bool
    {
        $statement =   " INSERT INTO " . $sql['table'];
        $statement .=  "(" . $this->imploder($sql,"array_keys") . ")";
        $statement .= "VALUES";
        $statement .= " (" . $this->imploder($sql,"array_values") . ")";
        return (bool) $this->query($statement);
    }

    public function read(array $sql = [])
    {
        $statement =  " SELECT " . $sql['columns'] . " FROM   " . $sql['table'] . " ";
        if (@$sql['where'] !== null) {
            $statement .= " WHERE ";
            $statement .= $sql['where'][0];
            $statement .= "=";
            $statement .= $sql['where'][1];
        }
        $statement = $this->query($statement);
        return $this->queryResult->get_result(@$sql['get'],$statement);

    }

    public function update(array $sql = []) : bool
    {
         $statement  = "UPDATE " . $sql['table'];
         $statement .= " SET " . $this->transformForUpdate($sql);
         return (bool) $this->query($statement);
    }

    public function delete()
    {
        //delete record

    }

    public function query(string $sql)
    {
        return $this->db->query($sql);
    }
}