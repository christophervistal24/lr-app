<?php
namespace App\Core;
use PDO;
class QueryResult
{
    public function get_result(string $type = null , $statement)
    {
        $fetch_type = ($type !== 'all') ? 'fetch' : 'fetchAll';

        return $statement->$fetch_type(PDO::FETCH_ASSOC);
    }
}


?>