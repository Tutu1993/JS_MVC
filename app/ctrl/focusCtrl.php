<?php
namespace App\Ctrl;

use Core\Core;
use App\Model\Database;

class focusCtrl extends Core
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
			'title' => '行业聚焦'
		];
        $this->assign($data);
        $this->display('focus.html');
    }
}
