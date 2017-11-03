<?php
namespace App\Ctrl;

use Core\Core;
use App\Model\Database;

class indexCtrl extends Core
{
    public function __construct()
    {
        if (!isset(parent::$action)) {
            $this->index();
        }
    }

    public function index()
    {
        $database = new Database('news');
        $data = [
			'title' => '首页'
		];
        $this->assign($data);
        $this->display('index.html');
    }
}
