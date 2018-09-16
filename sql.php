<?php

class Sql
{
    private $mysqli;

    public function __construct()
    {
        if (!$this->mysqli)
            $this->mysqli = new mysqli('localhost', 'me', 'mysql', 'country_base');
    }

    private function prepare_data($array)
    {
        foreach ($array as $k => $v) {
            $array[$k] = $this->mysqli->real_escape_string($v);
        }
        return $array;
    }

    public function insert_into_countries($array)
    {
        $array = $this->prepare_data($array);
        return $this->mysqli->query('Insert into `countries`(`country_name`,`country_descr`) values (\'' . $array['country_name'] . '\',\'' . $array['country_descr'] . '\')');
    }

    public function select_countries()
    {
        $query_result = $this->mysqli->query('Select `country_name`,`country_descr` from `countries`');
        if ($query_result)
            $query_result = $query_result->fetch_all(MYSQLI_ASSOC);
        return $query_result;
    }
}