<?php
namespace App\Ctrl;

use Core\Core;
use App\Model\Database;

class connectCtrl extends Core
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
			'title' => '联系我们'
		];
        $this->assign($data);
        $this->display('connect.html');
    }
}
