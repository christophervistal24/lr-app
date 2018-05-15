<?php
namespace App\Controller;
use App\Core\Functions;
use App\Core\Controller;
use App\Model\User;

class Page extends Controller
{
    use Functions;

    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function index()
    {
        $data['title'] = ' Home';
        $this->view('templates/header',$data);
        $this->view('templates/nav');
        $this->view('index');
        $this->view('templates/footer');
    }

    public function login()
    {
        if ($this->is_post()) {
            //this will need to become false for check because the validator return some message if the validation is failed
            //in php every string with value is a true
            if (!$this->user->isUser($_POST)) {
                $this->redirect('/evaluation/admin/dashboard');
            }else{
                $data['error_message'] = $this->user->isUser($_POST);
            }
        }
        $data['title'] = ' Login';
        $this->view('templates/header',$data);
        $this->view('templates/nav');
        $this->view('login',@$data);
        $this->view('templates/footer');
    }

    public function signup()
    {
        //wrong
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