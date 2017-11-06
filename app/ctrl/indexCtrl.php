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
        $database = new Database('news_table');
		$news = $database->select_d(
			[
				'id',
				'title',
				'pic',
				'tips',
				'time'
			],
			[
				'ORDER' => ['id' => 'DESC'],
				'LIMIT' => [0, 3]
			]
		);
        $data = [
			'title' => '首页',
			'news' => $news
		];
        $this->assign($data);
        $this->display('index.html');
    }
}
