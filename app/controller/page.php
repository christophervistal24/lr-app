<?php
class Page extends Controller
{
    private $model;
    private $admin;
    private $utilities;

    public function __construct()
    {
        $this->model     = $this->model('Database');
        $this->admin     = $this->model('Admin');
        $this->utilities = $this->model('Utilities');
    }

    public function login()
    {
        Controller::view('layouts/header',[]);
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            print_r($this->admin->check($_POST['username'],$_POST['password']));
        }
        Controller::view('login',[]);
        Controller::view('layouts/footer',[]);
    }

    public function signup()
    {
        // Controller::view('layouts/header',[]);
        Controller::view('signup',[]);
        Controller::view('layouts/footer',[]);
    }

    public function dashboard()
    {
        Controller::view('layouts/header',[]);
        Controller::view('admin/dashboard',[]);
        Controller::view('layouts/footer',[]);
    }

    public function createnew()
    {
        Controller::view('layouts/header',[]);
        Controller::view('admin/createnew',[]);
        Controller::view('layouts/footer',[]);
    }

    public function changeinfo()
    {
        Controller::view('layouts/header',[]);
        Controller::view('admin/changeinfo',[]);
        Controller::view('layouts/footer',[]);
    }

    public function logout()
    {
        Controller::view('logout',[]);
    }


}