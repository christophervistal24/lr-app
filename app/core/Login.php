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

    public function verifyLoginCredentials(array $items = [])
    {
        return $this->validator->validate_items([
            'action' => 'login',
            $items
        ]);
    }
}