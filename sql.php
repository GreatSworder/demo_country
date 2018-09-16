<?php

/**
 * Class Sql
 * Обрабатывает запросы на получение данных или их изменение в БД.
 * Позволяет подготовить данные перед добавлением их в таблицу.
 */
class Sql
{
    private static $mysqli;

    /**
     * Sql constructor.
     * Создание указателя на подключение к БД если его не существовало на момент создания экземпляра класса.
     * Передача данного указателя, если он был создан ранее.
     */
    public function __construct()
    {
        if (!self::$mysqli)
            self::$mysqli = new mysqli('localhost', 'me', 'mysql', 'country_base');
    }

    /**
     * Обработка функцией real_escape_string.
     * @param $array - получает данные полей которые требуется добавить в БД
     * @return mixed - возвращает подготовленные данные из полей формы
     */
    private function prepare_data($array)
    {
        foreach ($array as $k => $v) {
            $array[$k] = self::$mysqli->real_escape_string($v);
        }
        return $array;
    }

    /**
     * Добавление записи в таблицу countries
     * @param $array
     * @return bool- возвращает true - если вставка была успешна и false - в противном случае.
     */
    public function insert_into_countries($array)
    {
        $array = $this->prepare_data($array);
        return self::$mysqli->query('Insert into `countries`(`country_name`,`country_descr`) values (\'' . $array['country_name'] . '\',\'' . $array['country_descr'] . '\')');
    }

    /**
     * Запрос списка стран и их описания.
     * @return bool|mysqli_result - возвращает false - при ошибке исполнения Select и ассоц. массив со значениями,
     * при успешном выполнении запроса
     */
    public function select_countries()
    {
        $query_result = self::$mysqli->query('Select `country_name`,`country_descr` from `countries`');
        if ($query_result)
            $query_result = $query_result->fetch_all(MYSQLI_ASSOC);
        return $query_result;
    }
}