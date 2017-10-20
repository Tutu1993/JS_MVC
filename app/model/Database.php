<?php
namespace App\Model;

use Core\Lib\Model;

class Database extends Model
{
    public $table = '';

    public function __construct($table)
    {
        $this->table = $table;
		parent::__construct();
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
}
