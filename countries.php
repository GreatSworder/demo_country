<?php
/**
 * Created by PhpStorm.
 * User: ts
 * Date: 15.09.18
 * Time: 15:53
 */
require_once('sql.php');

/**
 * Class countries
 * Класс предназначен для обеспечения взаимодействия представления index.php и БД.
 *
 * При инициализации создается экземпляр класса взаимодействующего с БД.
 */
class countries
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new Sql();
    }

    /**
     * Запрос списка(из колонок country_name и country_descr) таблицы countries
     * Возвращает false - при ошибке запроса, и ассоц.массив - при успешном запросе
     * @return bool|mixed|mysqli_result
     */
    public function show_countries()
    {
        return $this->mysqli->select_countries();
    }

    /**
     * Вызов функции {@add_countries()} если была нажата кнопка "Добавить страну" и совершить редирект по ее завершению.
     */
    public function form()
    {
        if (isset($_POST['country_add']))
            $this->add_countries();
        else
            return;
        //Выполняется только была нажата кнопка формы
        header('Location:index.php');
    }

    /**
     * Получает данные полей country_name и country_descr.
     * Вызывает функцию вставки данных полей в таблицу countries.
     */
    public function add_countries()
    {
        $country['country_name'] = $_POST['country_name'] ?? null;
        $country['country_descr'] = $_POST['country_descr'] ?? null;
        if ($country['country_name'])
            $this->mysqli->insert_into_countries($country);
    }
}