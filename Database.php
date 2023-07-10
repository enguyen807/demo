<?php
class Database
{
    public $connect;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        try {
            $this->connect = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function query($statement, $params = [])
    {
        $statement = $this->connect->prepare($statement);
        $statement->execute($params);

        return $statement;
    }
}