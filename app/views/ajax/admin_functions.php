<?php
require_once dirname(__DIR__) . '../../init.php';
use App\Core\CRUD;
use App\Core\Database as DB;
use App\Core\Validation as Validator;

    if(isset($_POST['action'])){
        $action = $_POST['action'];
        $crud = new CRUD;
        $db = (new DB)->getInstance();
        $validator = new Validator($db);
        switch ($action)
        {
            case 'check_username' :
                $username = trim($_POST['username']);
                $result = $crud->read([
                    'columns' => 'username',
                    'table'   => 'admins',
                    'where'   => [
                        'username',"'{$username}'"
                    ],
                ]);
                if ($result['username']) {
                    echo json_encode(false);
                }else{
                    echo json_encode(true);
                }
                break;

             case 'check_email' :
                $email = trim($_POST['email']);
                $result = $crud->read([
                    'columns' => 'email',
                    'table'   => 'admins',
                    'where'   => [
                        'email',"'{$email}'"
                    ],
                ]);
                if ($result['email']) {
                    echo json_encode(false);
                }else{
                    echo json_encode(true);
                }
                break;

            case 'check_password' :
                $password = $_POST['password'];
                $result = $crud->read([
                    'columns' => 'password',
                    'table'   => 'admins',
                    'where'   => [
                        'id',$_SESSION['id']
                    ],
                ]);
                if (password_verify($password,$result['password'])) {
                    echo json_encode(true);
                }else{
                    echo json_encode(false);
                }
                break;

            case '_username_change' :
                //code for updating the username of the admin
                // $result = $validator->validate_items($_POST);
                $username = trim($_POST['username']);
                $result = $crud->update([
                    'columns' => [
                        'username' => $username,
                        'where id' => $_SESSION['id'],
                   ],
                   'table' => 'admins',
                ]);
                echo ($result === true) ? json_encode(['success'=>true,'message'=>'Successfully update your username']) : null;
                break;

            case '_info':
                //code for updating the personal information of the user
                extract($_POST);
                $getInformation = $crud->read([
                    'columns' => 'password,email',
                    'table' => 'admins',
                    'where' =>[
                        'id',$_SESSION['id']
                    ],
                ]);
                $user_email = (!empty($email)) ? $email : $getInformation['email'];
                if (password_verify($password,$getInformation['password'])) {
                     $result = $crud->update([
                       'columns' => [
                            'firstname'  => $firstname,
                            'middlename' => $middlename,
                            'lastname'   => $lastname,
                            'email'      => $user_email,
                            'birthday'   => $birthday,
                            'gender'     => $gender,
                            'where id'   => $_SESSION['id'],
                       ],
                        'table' => 'admins',
                    ]);
                     if($result){
                        echo json_encode([
                          'success'    => true,
                          'message'    => 'Successfully changed your personal information',
                          'firstname'  => $firstname,
                          'middlename' => $middlename,
                          'lastname'   => $lastname,
                          'email'      => $user_email,
                          ]);
                     }
                }
            break;

            case '_password_change':
                extract($_POST);
                $getCurrentPassword = $crud->read([
                    'columns' => 'password',
                    'table'   => 'admins',
                    'where'   => [
                        'id',$_SESSION['id']
                    ],
                ]);
                 if (password_verify($change_current_password,$getCurrentPassword['password'])) {
                  //update password
                      $result = $crud->update([
                        'columns' => [
                            'password' => password_hash($change_new_password,PASSWORD_DEFAULT),
                            'where id' => $_SESSION['id'],
                        ],
                        'table' => 'admins',
                      ]);

                  if ($result) {
                      echo json_encode([
                      'success'=> true,
                      'message'=> 'Successfully changed your password',
                      ]);
                  }
                }
                break;

            case 'change_check_password':
                $password = $_POST['password'];
                $result = $crud->read([
                    'columns' => 'password',
                    'table'   => 'admins',
                    'where'   => [
                        'id',$_SESSION['id']
                    ],
                ]);
                if (password_verify($password,$result['password'])) {
                    echo json_encode(false);
                }else{
                    echo json_encode(true);
                }
                break;

            case '_change_profile':
                $result = $validator->validate_items($_FILES+$_POST);
                extract($_FILES['profile_picture']);
                $path = 'public/assets/uploads/';
                if ($result == NULL) {
                    $update_result = $crud->update([
                        'columns' => [
                            'image'  => $name,
                            'where id' => $_SESSION['id'],
                        ],
                        'table' => 'admins',
                      ]);
                    $file = move_uploaded_file($tmp_name,APP['URL_ROOT'].$path.$name);
                    if ($update_result && $file) {
                           echo json_encode(['success'=> true,'message'=>'Successfully changed your profile picture','img'=> $name]);
                    }
                }
                break;

            case '_create':
                $result = $validator->validate_items($_FILES+$_POST);
                extract($_POST);
                extract($_FILES['image']);
                $path = 'public/assets/uploads/';
                if ($result == NULL) {
                     $create_result = $crud->create([
                       'columns' => [
                            'username'   => $username,
                            'password'   => password_hash($password,PASSWORD_DEFAULT),
                            'firstname'  => $firstname,
                            'middlename' => $middlename,
                            'lastname'   => $lastname,
                            'gender'     => $gender,
                            'birthday'   => $birthday,
                            'email'      => $email,
                            'image'      => $name,
                       ],
                       'table' => 'admins',
                    ]);
                    $file = move_uploaded_file($tmp_name,APP['URL_ROOT'].$path.$name);
                    if ($create_result && $file) {
                           echo json_encode(['success'=> true,'message'=>'Successfully create new admin']);
                    }
                }
                break;
        }
    }

?>
