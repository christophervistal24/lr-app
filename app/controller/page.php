<?php
class Page extends Controller
{
    private $model;
    private $admin;

    public function __construct()
    {
        $this->model = $this->model('Database');
        $this->admin = $this->model('Admin');
    }

    // Login page
    public function login()
    {
        Controller::view('layouts/header',[]);
        if(isset($_POST['login-username'])){
            $username = $_POST['login-username'];
            print_r($this->admin->login($username));
        }
        Controller::view('login',[]);
        Controller::view('layouts/footer',[]);
    }

    // Dashboard page
    public function index()
    {
        Controller::view('layouts/header',[]);
        Controller::view('admin/index',[]);
        Controller::view('layouts/footer',[]);
    }

    // Sign up page
    public function signup()
    {
        Controller::view('layouts/header',[]);
        Controller::view('signup',[]);
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
}