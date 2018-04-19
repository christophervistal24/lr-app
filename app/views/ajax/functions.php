<?php
spl_autoload_register(function($class){
    require_once '../../model/' . $class .'.php';
});
$DB    = (new Database)->getInstance();
$Util  = new Utilities;
$Admin = new Admin;

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
                function array_except($array, $keys) {
                  return array_diff_key($array, array_flip((array) $keys));
                }
                $output = array_except($_POST, ['action']);
                if($Admin->create_new_user($output['admin'])){
                  echo json_encode(['success'=>true]);
                }else{
                  echo json_encode(['success'=>false]);
                }
            break;
        }
    }

?>
