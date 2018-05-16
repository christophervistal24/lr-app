<?php
namespace App\Model;
use App\Core\Login;

class User
{
    //login class which can identify if the user is admin or not
    private $login;

    public function __construct()
    {
        $this->login = new Login;
    }

    public function isUser(array $user_input = [])
    {
       return $this->login->verifyLoginCredentials($user_input);
    }
}