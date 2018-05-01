<?php
namespace App\Controller;
use App\Core\Controller , App\Model\Admin as Admin_model;
class Admin extends Controller
{
    protected $info;
    private $admin , $csv;

    public function __construct()
    {
        $this->admin = new Admin_model;
        $this->info =  $this->admin->find_by(@$_SESSION['id'],'id',
                            ['username','firstname','middlename','lastname','gender','birthday','email','image']);
        $this->csv = $this->admin->import_csv($_FILES);
    }
    public function index()
    {
        $data       = $this->info;
        $import_csv = $this->csv;
        $this->view('templates/header',['user_info' => $data]);
        $this->view('admin/dashboard',['csv' => $import_csv]);
        $this->view('templates/modal',['title'=>'Import CSV']);
        $this->view('templates/footer');
    }

    public function createnew()
    {
        $data       = $this->info;
        $import_csv = $this->csv;
        if(isset($_FILES['image']) && isset($_POST['admin'])){
            $user_input = array_merge($_POST['admin'],$_FILES['image']);
        }
        $this->view('templates/header',['user_info' => $data]);
        $this->view('admin/createnew',[
            'validate' => $this->admin->validate(isset($user_input) ? $user_input : null),
            'csv' => $import_csv,
        ]);
        $this->view('templates/modal',['title'=>'Import CSV']);
        $this->view('templates/footer');
    }

    public function changeinfo()
    {
        $data       = $this->info;
        $import_csv = $this->csv;
        $this->view('templates/header',['user_info' => $data]);
        $this->view('admin/changeinfo',[
            'user_info' => $data,
            'csv'       => $import_csv,
        ]);
        $this->view('templates/modal',['title'=>'Import CSV']);
        $this->view('templates/footer');
    }

    public function profile()
    {
        $data       = $this->info;
        $import_csv = $this->csv;
        $this->view('templates/header',['user_info' => $data]);
        $this->view('admin/profile',[
            'user_info' => $data,
            'csv'       => $import_csv,
        ]);
        $this->view('templates/modal',['title'=>'Import CSV']);
        $this->view('templates/footer');
    }


    public function logout()
    {
        $this->view('logout',[]);
    }

}