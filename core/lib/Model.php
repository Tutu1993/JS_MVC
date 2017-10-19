<?php
namespace Core\Lib;

use Medoo\Medoo;

class Model extends Medoo
{
    public function __construct()
    {
        $option = Conf::get('database');
        parent::__construct($option);
    }
}
