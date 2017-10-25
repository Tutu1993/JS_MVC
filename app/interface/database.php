<?php
include '../../core/extra/function.php';
include '../../vendor/autoload.php';

use Medoo\Medoo;

class Database extends Medoo
{
    public $table;

    public function __construct($table)
    {
        $this->table = $table;
        $option = [
            'database_type' => 'mysql',
            'database_name' => 'test',
            'server' => 'localhost',
            'username' => 'root',
            'password' => 'Shan0720',
            'charset' => 'utf8'
        ];
        parent::__construct($option);
    }

    public function select_d($columns, $where)
    {
        $result = $this->select($this->table, $columns, $where);
        return $result;
    }

    public function insert_d($data)
    {
        $result = $this->insert($this->table, $data);
        return $result->rowCount();
    }

    public function update_d($data, $where)
    {
        $result = $this->update($this->table, $data, $where);
        return $result->rowCount();
    }

    public function delete_d($where)
    {
        $result = $this->delete($this->table, $where);
        return $result->rowCount();
    }

    public function get_d($columns, $where)
    {
        $result = $this->get($this->table, $columns, $where);
        return $result;
    }

	public function has_d($where)
	{
		$result = $this->has($this->table, $where);
		return $result;
	}
}

function switchType ($type, $database, $data) {
	switch ($type) {
		case 'select':
			return !isset($data['columns']) ? 'Please confirm isset [columns]' : (!isset($data['where']) ? 'Please confirm isset [where]' : $database->select_d($data['columns'], $data['where']));
			break;
		case 'insert':
			return !isset($data['data']) ? 'Please confirm isset [data]' : ($database->insert_d($data['data']) === 0 ? false : true);
			break;
		case 'update':
			return !isset($data['data']) ? 'Please confirm isset [data]' : (!isset($data['where']) ? 'Please confirm isset [where]' : ($database->update_d($data['data'], $data['where']) === 0 ? false : true));
			break;
		case 'delete':
			return !isset($data['where']) ? 'Please confirm isset [where]' : ($database->delete_d($data['where']) === 0 ? false : true);
			break;
		case 'get':
			return !isset($data['columns']) ? 'Please confirm isset [columns]' : (!isset($data['where']) ? 'Please confirm isset [where]' : $database->get_d($data['columns'], $data['where']));
			break;
		case 'has':
			return !isset($data['where']) ? 'Please confirm isset [where]' : $database->has_d($data['where']);
			break;
		default:
			return 'type_null';
			break;
	}
}

$database = new Database('info');
$result = $database->has_d(['uid' => '3']);
p($result);

// $result = isset($_POST['table']) ? (isset($_POST['type']) ? (isset($_POST['data']) ? switchType($_POST['type'], new Database($_POST['table']), $_POST['data']) : 'Please confirm isset [data]') : 'Please confirm isset [type]') : 'Please confirm isset [table]';

// echo json_encode($result);

die();
