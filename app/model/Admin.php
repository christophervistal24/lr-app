<?php
namespace App\Model;
use App\Core\Database as DB;
use App\Core\CRUD;

class Admin extends DB
{
  private $action;

  public function __construct()
  {
    $this->action = new CRUD;
  }

  public function getAdminInformation(int $user_id)
  {
     return $this->action->read([
            'columns' => '*',
            'table'   => 'admins',
            'where' => [
                'id',
                'id_value' => $user_id,
            ],
     ]);
  }
}
