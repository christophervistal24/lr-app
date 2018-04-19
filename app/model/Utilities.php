<?php
class Utilities
{
    public static function e($data)
    {
        return htmlspecialchars(trim(stripslashes(strip_tags($data))));
    }
}
?>