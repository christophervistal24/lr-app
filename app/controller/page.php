<?php
class Page extends Controller
{
    private $model;
    private $admin;

    public function __construct()
    {
        $this->model = $this->model('Database');
    }

    public function login()
    {
        // Controller::view('layouts/header',[]);
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['admin'];
            $this->model('Admin',$args)->create_new_user();
        }
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