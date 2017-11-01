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

	public function view()
    {
        // $database = new Database('info');
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$data = [
			'title' => '凯融视角',
			'type' => 'view',
			'D_page' => 9,
			'page' => $page
		];
        $this->assign($data);
        $this->display('news_list.html');
    }

	public function case()
    {
        // $database = new Database('info');
		$data = [
			'title' => '案例分析',
			'type' => 'case',
			'D_page' => 4,
			'page' => 0
		];
        $this->assign($data);
        $this->display('news_list.html');
    }

	public function event()
    {
        // $database = new Database('info');
		$data = [
			'title' => '凯融活动',
			'type' => 'event',
			'D_page' => 4,
			'page' => 0
		];
        $this->assign($data);
        $this->display('news_list.html');
    }
}
