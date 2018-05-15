<?php
namespace App\Core;
use App\Core\Validation;
use App\Core\Database as DB;
class Login
{
    private $validator;

    public function __construct()
    {
        $this->validator = new Validation(
            (new DB)->getInstance()
         );
    }

    public function checkLoginCredentials(array $items = [])
    {
        $this->validator->addRuleMessage('isUsernameAccepted','Please check your username or password');
        $this->validator->addRuleMessage('isPasswordCorrect','Please check your username or password');
        $this->validator->validate([
            'username|Username'  => [$items['username'],'required|isUsernameAccepted'],
            'password|Password'  => [$items['password'],'required|isPasswordCorrect'],
        ]);

        return $this->validator->errors()->all();
    }
}