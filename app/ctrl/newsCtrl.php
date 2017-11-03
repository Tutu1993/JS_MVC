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
        $database = new Database('news');
		$news = $database->select_d(
			[
				'id',
				'title',
				'summary'
			],
			[
				'ORDER' => ['id' => 'DESC'],
				'LIMIT' => [0, 4]
			]
		);
        $data = [
			'title' => '新闻资讯',
			'news' => $news
		];
        $this->assign($data);
        $this->display('news.html');
    }

	public function view()
    {
        $database = new Database('news');
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$D_page = $database->select_d(
			[
				'id'
			],
			[
				'ORDER' => ['id' => 'DESC'],
				'type' => 0
			]
		);
		$news = $database->select_d(
			[
				'id',
				'title',
				'pic',
				'summary'
			],
			[
				'ORDER' => ['id' => 'DESC'],
				'type' => 0,
				'LIMIT' => [($page - 1) * 5, 5]
			]
		);
		$data = [
			'title' => '凯融视角',
			'type' => 'view',
			'D_page' => ceil(count($D_page) / 5),
			'page' => $page,
			'news' => $news
		];
        $this->assign($data);
        $this->display('news_list.html');
    }

	public function case()
    {
		$database = new Database('news');
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$D_page = $database->select_d(
			[
				'id'
			],
			[
				'ORDER' => ['id' => 'DESC'],
				'type' => 1
			]
		);
		$news = $database->select_d(
			[
				'id',
				'title',
				'pic',
				'summary'
			],
			[
				'ORDER' => ['id' => 'DESC'],
				'type' => 1,
				'LIMIT' => [($page - 1) * 5, 5]
			]
		);
		$data = [
			'title' => '案例分析',
			'type' => 'case',
			'D_page' => ceil(count($D_page) / 5),
			'page' => $page,
			'news' => $news
		];
        $this->assign($data);
        $this->display('news_list.html');
    }

	public function event()
    {
		$database = new Database('news');
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$D_page = $database->select_d(
			[
				'id'
			],
			[
				'ORDER' => ['id' => 'DESC'],
				'type' => 2
			]
		);
		$news = $database->select_d(
			[
				'id',
				'title',
				'pic',
				'summary'
			],
			[
				'ORDER' => ['id' => 'DESC'],
				'type' => 2,
				'LIMIT' => [($page - 1) * 5, 5]
			]
		);
		$data = [
			'title' => '凯融活动',
			'type' => 'event',
			'D_page' => ceil(count($D_page) / 5),
			'page' => $page,
			'news' => $news
		];
        $this->assign($data);
        $this->display('news_list.html');
    }

	public function show()
    {
		$id = explode('.', $_GET['id'])[0];
        $database = new Database('news');
		$news = $database->get_d(
			[
				'id',
				'title',
				'summary',
				'type'
			],
			[
				'ORDER' => ['id' => 'DESC'],
				'id' => $id
			]
		);
		$D_news = $database->select_d(
			[
				'id',
				'title'
			],
			[
				'ORDER' => ['id' => 'DESC'],
				'type' => $news['type']
			]
		);
		$data = [
			'news' => $news,
			'D_news' => $D_news
		];
        $this->assign($data);
        $this->display('news_show.html');
    }
}
