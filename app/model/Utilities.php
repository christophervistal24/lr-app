<?php
class Utilities
{

    // Escaping characters to prevent SQL Injection attack
    public static function e($data)
    {
        return htmlspecialchars(trim(stripslashes(strip_tags($data))));
    }

    // Delete some element in a array
    public function array_except($array,$keys)
    {
        return array_diff_key($array, array_flip((array) $keys));
    }

}
?>