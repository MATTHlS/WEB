<?php

class Database{
    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASSWORD;

    private $_connection;
    private $stat;
    
    public $id;

    public function __construct(){
        $this->_connection = null;
        try{
            $this->_connection = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->dbname,
                $this->username,
                $this->password
            );
        } catch (PDOException $exception){
            echo "Err :" . $exception->getMessage();
        }
    }

    public function prepare($sql){
        $this->stat = $this->_connection->prepare($sql);
    }

    public function execute(){
        $this->stat->execute();
    }

    public function single(){
        return $this->stat->fetch();
    }

    public function resultSet(){
        return $this->stat->fetchAll();
    }

    public function rowCount(){
        return $this->stat->rowCount();
    }

    public function lastInsertedId(){
        return $this->stat->lastInsertedId();
    }
}

/*
$db = new Database();
$db->prepare("SELECT * from users");
$db->execute();
var_dump($db->rowCount());
?>
*/

