<?php
namespace App\Ctrl;

use Core\Core;
use App\Model\Database;

class aboutCtrl extends Core
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
			'title' => '关于我们'
		];
        $this->assign($data);
        $this->display('about.html');
    }
}
