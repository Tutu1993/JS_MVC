<?php
namespace App\Ctrl;

use Core\Core;
use App\Model\Database;

class newsCtrl extends Core
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
			'title' => '新闻资讯'
		];
        $this->assign($data);
        $this->display('news.html');
    }
}
