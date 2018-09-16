<?php
/**
 * Created by PhpStorm.
 * User: ts
 * Date: 15.09.18
 * Time: 15:53
 */
require_once('sql.php');
class countries
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new Sql();
    }

    public function show_countries()
    {
        return $this->mysqli->select_countries();
    }
    public function form()
    {
        if(isset($_POST['country_add']))
            $this->add_countries();
        else
            return;
        header('Location:index.php');
    }
    public function add_countries()
    {
        $country['country_name'] = $_POST['country_name'] ?? null;
        $country['country_descr'] = $_POST['country_descr'] ?? null;
        if($country['country_name'])
            $this->mysqli->insert_into_countries($country);
        }
}