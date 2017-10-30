<?php
namespace App\Ctrl;

use Core\Core;
use App\Model\Database;

class modelCtrl extends Core
{
    public function __construct()
    {
        if (!isset(parent::$action)) {
            $this->index();
        }
    }

    public function index()
    {
        // $database = new Database('info');
        $data = [
			'title' => '业务模式'
		];
        $this->assign($data);
        $this->display('model.html');
    }
}
