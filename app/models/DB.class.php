<?php
class DB
{
    /**
     * @var SQLite3
     */
    private $connection;

    public static function getInstance()
    {
        static $instance;
        return $instance ? $instance : $instance = new DB();
    }

    public function __construct()
    {
        $db_filename = APP_DIR .  'data/search.sqlite';
        $this->connection = new SQLite3($db_filename);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function getSearchResultsByID($id)
    {
        $query = 'select * from search_results where id = :id';
        $sth = $this->getConnection()->prepare($query);
        $sth->bindValue(':id', $id);
        $result = $sth->execute();
        $result = $result->fetchArray();
        $result['items'] = explode('##', $result['results']);
        return $result;
    }

    public function getAllSearchResults()
    {
        $query = 'select * from search_results';
        $sth = $this->getConnection()->prepare($query);
        $res = $sth->execute();

        $row = array();
        while ($item = $res->fetchArray()){
            $row[] = $item;
        }
        return $row;
    }

    public function processResults($url, $results, $type)
    {
        $res = implode('##', $results);

        $query = "INSERT INTO search_results(url, results, search_types, count)" .
            " VALUES (:url, :results, :search_types, :count)";
        $insert = $this->getConnection()->prepare($query);
        $insert->bindValue(':url', $url);
        $insert->bindValue(':results', $res);
        $insert->bindValue(':search_types', $type);
        $insert->bindValue(':count', count($results));
        $insert->execute();
    }

}