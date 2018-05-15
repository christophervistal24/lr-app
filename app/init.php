<?php
ob_start();
session_start();
// use  App\Core\Database;
// use  App\Core\Utilities;
// use  App\Model\Admin;
// use  App\Core\File;

define('APP',[
    'URL_ROOT' => str_replace("\\","/",dirname(__DIR__)) . "/",
    'APP_ROOT' => str_replace("\\","/",dirname(__DIR__)) . "/app/",
    'DOC_ROOT' =>  "/" . str_replace("\\","/",basename(dirname(__DIR__))) . "/",
]);


require_once APP['URL_ROOT'] . 'vendor/autoload.php';
// $database = new Database();
// $Util     = new Utilities;
// $Admin    = new Admin;
// $File     = new File;



