<?php
class Sql
{
    private $mysqli;
    public function __construct()
    {
        if(!$this->mysqli)
            $this->mysqli=new mysqli('localhost','me','mysql','country_base');
    }
    public function query($query_string)
    {
        $query_string=$this->mysqli->real_escape_string($query_string);
        $result=$this->mysqli->query($query_string);
        if(!is_bool($result))
            $result=$result->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}