<?php
namespace App\Controller;
use App\Core\Controller;
use App\Core\Functions;
use App\Core\Validation;
use App\Core\Database as DB;
use App\Model\Admin as AdminModel;

class Admin extends Controller
{
    use Functions;

    protected $info;
    private $admin , $csv;
    private $validator;

    public function __construct()
    {
        $this->admin = new AdminModel;
        $this->validator = new Validation((new DB)->getInstance());
        $this->info['user_info'] = $this->admin->getAdminInformation((int)$_SESSION['id']);
    }

    public function index($title = '')
    {
        $data          = $this->info;
        $data['title'] = $title;
        $this->view('templates/header',$data);
        $this->view('admin/dashboard');
        $this->view('templates/footer');
    }

    public function createnew()
    {
        $data = $this->info;                                            //same as array_push
        $result = ($this->is_post()) ? $this->validator->validate_items($_POST+$_FILES) : null;
        $data['title'] = " Create new Admin";
        $this->view('templates/header',$data);
        $this->view('admin/createnew');
        $this->view('templates/footer');
    }

    public function changeinfo()
    {                                                                   //same as array_push
        $result = ($this->is_post()) ? $this->validator->validate_items($_POST+$_FILES) : null;
        $data   = $this->info;
        $data['error_message'] = $result;
        $data['title'] = " Change Information";
        $this->view('templates/header',$data);
        $this->view('admin/changeinfo',$data);
        $this->view('templates/footer');
    }

    public function profile()
    {
        $data  = $this->info;
        $data['title'] = " Profile";
        $this->view('templates/header',$data);
        $this->view('admin/profile',$data);
        $this->view('templates/footer');
    }


    public function logout()
    {
        $this->view('logout',[]);
    }

}