<?php
namespace scarf\lib;

use Medoo\Medoo;

class model extends Medoo
{
    public function __construct()
    {
        $option = conf::get('database');
        parent::__construct($option);
    }
}
