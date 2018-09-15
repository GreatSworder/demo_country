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
        $this->mysqli=new Sql();
        $this->show_countries();
        $this->form();
    }
    public function form()
    {
        if(isset($_POST['country_add'])){
            $this->add_countries();}

    }
    public function show_countries()
    {
        return $this->mysqli->query('Select `country_name`,`country_descr` from `countries`');
    }
    public function add_countries()
    {
        $country_name=$_POST['country_name']??null;
        $country_descr=$_POST['country_descr']??null;
        $this->mysqli->query('Insert into `countries`(`country_name`,`country_descr`) values ("'.$country_name.'","'.$country_descr.'")');
    }
}