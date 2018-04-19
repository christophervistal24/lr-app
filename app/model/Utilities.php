<?php
class Utilities
{
    public static function e($data)
    {
        return htmlspecialchars(trim(stripslashes(strip_tags($data))));
    }

    public function array_except($array,$keys)
    {
        return array_diff_key($array, array_flip((array) $keys));
    }
}
?>