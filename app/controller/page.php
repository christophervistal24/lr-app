<?php
class Page extends Controller
{
    private $admin;


    public function __construct()
    {
        $this->admin     = $this->model('Admin');
    }

    public function login()
    {
        Controller::view('layouts/header',['title'=>' | Home']);
        Controller::view('login',['validate'=> $this->admin->is_user($_POST) ]);
        Controller::view('layouts/footer',[]);
    }

    public function signup()
    {
        // Controller::view('layouts/header',[]);
        Controller::view('signup',[]);
        Controller::view('layouts/footer',[]);
    }

    public function forgot()
    {
        Controller::view('layouts/header',['title'=>' | Forgot password']);
        Controller::view('forgot_password',[]);
        Controller::view('layouts/footer',[]);
    }

    public function dashboard()
    {
        Controller::view('layouts/header',['title'=>' | Dashboard']);
        Controller::view('admin/dashboard',[]);
        Controller::view('layouts/footer',[]);
    }

    public function createnew()
    {
        Controller::view('layouts/header',['title'=>' | Create new account']);
        Controller::view('admin/createnew',[]);
        Controller::view('layouts/footer',[]);
    }

    public function changeinfo()
    {
        Controller::view('layouts/header',['title'=>' | Change Profile']);
        Controller::view('admin/changeinfo',[]);
        Controller::view('layouts/footer',[]);
    }

    public function logout()
    {
        Controller::view('logout',[]);
    }


}