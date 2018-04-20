<?php
spl_autoload_register(function($class){
    require_once '../../model/' . $class .'.php';
});

$DB    = (new Database)->getInstance();
$Util  = new Utilities;
$Admin = new Admin;
$File  = new File;

    if(isset($_POST['action'])){
        $action = trim($_POST['action']);
        switch ($action) {

            case 'checkUsername':
               $username = $Util->e($_POST['username']);
               echo ($Admin->check($username,'username') ? 0 : ['success'=>false]);
             break;

            case 'checkEmail':
               $email = $Util->e($_POST['email']);
               echo ($Admin->check($email,'email') ? [] :  ['success'=>false]);
            break;

            case '_create':
                $File->validate($_FILES['image']);
                $output   = $Util->array_except($_POST, ['action']);
                $new_data = array_merge($output['admin'],['image'=>$_FILES['image']['name']]);
                if($Admin->create_new_user($new_data)){
                  echo json_encode(['success'=>true]);
                }else{
                  echo json_encode(['success'=>false]);
                }
            break;
        }
    }

?>
