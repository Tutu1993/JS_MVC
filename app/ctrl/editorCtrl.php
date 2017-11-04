<?php
namespace App\Ctrl;

use Core\Core;
use App\Model\Database;

session_start();

class editorCtrl extends Core
{
    public function __construct()
    {
        if (!isset(parent::$action)) {
            $this->login();
        }
    }

    public function login()
    {
        if (isset($_SESSION['isLogin'])) {
            Header("Location:http://localhost/editor/list");
        } else {
            $this->display('editor_login.html');
        }
    }

    public function list()
    {
        if (isset($_SESSION['isLogin'])) {
			$database = new Database('news');
			$news_1 = $database->select_d(
				[
					'id',
					'title'
				],
				[
					'ORDER' => ['id' => 'DESC'],
					'type' => 0
				]
			);
			$news_2 = $database->select_d(
				[
					'id',
					'title'
				],
				[
					'ORDER' => ['id' => 'DESC'],
					'type' => 1
				]
			);
			$news_3 = $database->select_d(
				[
					'id',
					'title'
				],
				[
					'ORDER' => ['id' => 'DESC'],
					'type' => 2
				]
			);
			$data = [
				'title' => '新闻列表',
				'news_1' => $news_1,
				'news_2' => $news_2,
				'news_3' => $news_3
			];
	        $this->assign($data);
            $this->display('editor_list.html');
        } else {
            echo 'PLEASE LOGIN!';
            echo '<meta http-equiv="refresh" content="2; url=/editor/login" />';
        }
    }

    public function change()
    {
        if (isset($_SESSION['isLogin'])) {
            $id = explode('.', $_GET['id'])[0];
            $data = [
				'id' => $id
			];
	        $this->assign($data);
            $this->display('editor_change.html');
        } else {
            echo 'PLEASE LOGIN!';
            echo '<meta http-equiv="refresh" content="2; url=/editor/login" />';
        }
    }

	public function insert()
    {
        if (isset($_SESSION['isLogin'])) {
            $this->display('editor_insert.html');
        } else {
            echo 'PLEASE LOGIN!';
            echo '<meta http-equiv="refresh" content="2; url=/editor/login" />';
        }
    }
}
