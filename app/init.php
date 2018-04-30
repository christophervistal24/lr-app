<?php
ob_start();
session_start();
define('LR_APP',str_replace(DIRECTORY_SEPARATOR, "/",dirname(__DIR__)));
define('APP',LR_APP . '/app');
require_once __DIR__ . '/../vendor/autoload.php';
require_once APP . '/libraries/vendor/autoload.php';
require_once APP . '/libraries/phpmailer/PHPMailerAutoload.php';

use App\Model\Database;
use App\Core\Utilities;
use App\Model\Admin;
use App\Core\File;

$database = new Database;
$Util     = new Utilities;
$Admin    = new Admin;
$File     = new File;



