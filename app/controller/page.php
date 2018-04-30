<?php
namespace App\Controller;
use App\Core\Controller;
use App\Model\Admin;
class Page extends Controller
{
    private $admin;
    private $info;


    public function __construct()
    {
        $this->admin = new Admin;
        $this->info      = $this->admin->find_by(@$_SESSION['id'],'id',
                            ['username','firstname','middlename','lastname','gender','birthday','email','image']);
    }


    public function login()
    {
        $this->view('login',[
            'validate'=> $this->admin->is_user($_POST)
        ]);
    }

    public function signup()
    {
        $this->view('signup',[]);
    }

    public function forgot()
    {
        $this->view('forgot_password');
    }

    public function dashboard()
    {
        $data       = $this->info;
        $import_csv = $this->admin->import_csv($_FILES);
        $this->view('admin/dashboard',[
            'user_info' => $data,
            'csv'       => $import_csv,
        ]);
    }

    public function createnew()
    {

        $this->view('admin/createnew',[
            'validate'=> $this->admin->validate(array_merge($_POST , $_FILES))
        ]);
    }

    public function changeinfo()
    {
        $this->view('admin/changeinfo',[
            'user_info' => $this->info,
        ]);
    }

    public function profile()
    {
        $this->view('admin/profile',[
            'user_info' => $this->info,
        ]);
    }


    public function logout()
    {
        $this->view('logout',[]);
    }


}