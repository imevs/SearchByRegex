<?php
class DB
{
    /**
     * @var PDO
     */
    private $connection;

    public static function getInstance()
    {
        static $instance;
        return $instance ? $instance : $instance = new DB();
    }

    public function __construct()
    {
        $db_filename = APP_DIR .  'data\search.sqlite';
        $this->connection = new PDO('sqlite:'. $db_filename);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function getSearchResultsByID($id)
    {
        $query = 'select * from search_results where id = ?';

        $sth = $this->getConnection()->prepare($query);
        $sth->execute(array($id));

        $result = $sth->fetchAll();
        $result = array_map(function($item) {
            $item['items'] = explode('##', $item['results']);
            return $item;
        }, $result);
        return $result[0];
    }

    public function getAllSearchResults()
    {
        $query = 'select * from search_results';
        $sth = $this->getConnection()->prepare($query);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function processResults($url, $results, $type)
    {
        $query = "INSERT INTO search_results(url, results, search_types, count) VALUES (?, ?, ?, ?)";
        $insert = $this->getConnection()->prepare($query);
        $res = implode('##', $results);
        $insert->execute(array($url, $res, $type, count($results)));
    }

}