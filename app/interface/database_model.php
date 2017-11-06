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
        $option = include '../config/database.php';
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
