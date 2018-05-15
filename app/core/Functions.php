<?php
namespace App\Core;
trait Functions
{
    public function check_password($password,$hash_password)
    {
        return password_verify($password,$hash_password);
    }

    public function is_post()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    private function imploder(array $items,string $method_used)
    {
        switch ($method_used) {
            case "array_keys":
                $transform_items =  implode(",",$method_used($items['columns']));
                break;

            case "array_values":
                $transform_items =  "'" . implode("','",$method_used($items['columns'])) . "'";
                break;
        }
         return $transform_items;
    }

    public function transformForUpdate(array $items = [])
    {
        $columns = null;
        $count = count($items['columns']);
        $i = 0;
        foreach ($items['columns'] as $key => $value) {
            $i++;
            $columns .= $key . "=\"" . $value . "\"";
            $columns .= ($i !== $count -1 && $i !== $count) ? ',' : null;
        }
        return $columns;
    }


    public function post(string $field_name)
    {
        if ($this->is_post() && isset($_POST[$field_name])) {
            return trim($_POST[$field_name]);
        }
    }

}