<?php
spl_autoload_register(function($class){
    require_once '../../model/' . $class .'.php';
});
$DB = new Database;
$con = $DB::$database;
    if(isset($_POST['action'])){
        $action = trim($_POST['action']);
        switch ($action) {
            case 'checkUsername':
                $username = htmlspecialchars(trim(stripslashes(strip_tags($_POST['username']))));
                $result   = $con->query("SELECT COUNT(username) FROM admins WHERE username='" . $username . "'");
                $stmt     =  $result->fetch(PDO::FETCH_ASSOC);
                if($stmt['COUNT(username)'] == 1){
                    echo 0;
                }else{
                    echo 1;
                }
                break;

            case 'checkEmail':
                $email  = htmlspecialchars(trim(stripslashes(strip_tags($_POST['email']))));
                $result = $con->query("SELECT COUNT(email) FROM admins WHERE email='" . $email . "'");
                $stmt   =  $result->fetch(PDO::FETCH_ASSOC);
                if($stmt['COUNT(email)'] == 1){
                    echo 0;
                }else{
                    echo 1;
                }
                break;
            break;
        }
    }

?>
