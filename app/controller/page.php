<?php
class Page extends Controller
{
    private $admin;
    private $info;


    public function __construct()
    {
        $this->admin     = $this->model('Admin');
        $this->info      = $this->admin->find_by(@$_SESSION['id'],'id',
                            ['username','firstname','middlename','lastname','gender','birthday','email','image']);
    }


    public function login()
    {
        Controller::view('layouts/header',['title'=>' | Home']);
        Controller::view('login',[
            'validate'=> $this->admin->is_user($_POST)
        ]);
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
        Controller::view('layouts/header',[
            'title'=>' | Forgot password',
        ]);
        Controller::view('forgot_password',[]);
        Controller::view('layouts/footer',[]);
    }

    public function dashboard()
    {
        Controller::view('layouts/header',[
         'title'=>' | Dashboard',
         'user_info' => $this->info,
        ]);
        Controller::view('admin/dashboard',[
            'csv' => $this->admin->import_csv($_FILES),
        ]);
        Controller::view('layouts/footer',[]);
    }

    public function createnew()
    {
        Controller::view('layouts/header',[
            'title'=>' | Create new account',
            'user_info' => $this->info,
        ]);
        Controller::view('admin/createnew',[
            'validate'=> $this->admin->validate(array_merge($_POST,$_FILES))
        ]);
        Controller::view('layouts/footer',[]);
    }

    public function changeinfo()
    {
        Controller::view('layouts/header',[
            'title'=>' | Change Profile',
            'user_info' => $this->info,
        ]);
        Controller::view('admin/changeinfo',[
            'user_info' => $this->info,
        ]);
        Controller::view('layouts/footer',[]);
    }

    public function profile()
    {
        Controller::view('layouts/header',[
            'title'=>' | Profile',
            'user_info' => $this->info,
        ]);
        Controller::view('admin/profile',[
            'user_info' => $this->info,
        ]);
        Controller::view('layouts/footer',[]);
    }


    public function logout()
    {
        Controller::view('logout',[]);
    }


}