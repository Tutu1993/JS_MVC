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
		$news = $database->select_d([
			'id',
			'title',
			'pic',
			'tips'
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
		p($news);
        $this->assign($data);
        $this->display('index.html');
    }
}
