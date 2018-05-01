<?php
namespace App\Controller;
use App\Core\Controller , App\Model\Admin as Admin_Model;

class Page extends Controller
{
    private $admin;
    private $info;


    public function __construct()
    {
        $this->admin = new Admin_Model;
    }

    public function index()
    {
        $this->view('templates/header');
        $this->view('templates/nav');
        $this->view('index');
        $this->view('templates/footer');
    }
    public function login()
    {
        $data = $this->admin->is_user($_POST);
        $this->view('templates/header');
        $this->view('templates/nav');
        $this->view('login',['validate'=> $data]);
        $this->view('templates/footer');
    }

    public function signup()
    {
        $this->view('templates/header');
        $this->view('templates/nav');
        $this->view('signup',[]);
        $this->view('templates/modal',[
            'title'=>'Sample Title',
            'content'=>'Lorem. . .'
        ]);
        $this->view('templates/footer');
    }

    public function forgot()
    {
        $this->view('templates/header');
        $this->view('templates/nav');
        $this->view('forgot_password');
        $this->view('templates/footer');
    }

}