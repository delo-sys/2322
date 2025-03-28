<?php

class Database {
    private $host =DB_HOST;
    private $user =DB_USER;
    private $pass =DB_PASS;
    private $dbname=DB_NAME;

    private $conn;
    private $stmt;
    private $error;

    public function __construct() {
        // set DSN 
        $dsn = 'mysql:host='. $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // CREATE PDO INSTANCE
        try {
            $this->conn = new PDO ($dsn, $this->user , $this->pass,$options);
        }catch (PDOException $e) {
            $this->error = $e ->getMessage();
            echo "connection Error;". $this->error;
        }
    }    
        // preare statement with qurey 
    public function query ($sql) {
        $this->stmt = $this->conn->prepare($sql);
    }

    // bind values 
    public function  bind ($param,$value,$type = null){
        if (is_null($type)){
            switch (true){
                case is_int($value):
                    $type = PDO::PARAM_NULL;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_NULL;
                    break;
                case is_null ($value):
                    $type=PDO::PARAM_NULL;
                    break;
                default:
                $type = PDO::PARAM_STR; 
            }
        }$this->stmt->bindvalue($param,$value,$type);
    }

    // execute the prepare statement
    public function resultSet() {
        $this->execute();
        return $this->stmt->execute();
    }

    // get single record as object
    public function single () {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    // Get row count 
    public function rowcount() {
        return $this->stmt>rowcount();
    }

    // get lastinsertid 
    public function lastInsertId(){
        return $this->stmt->lastInsertId();
    }
}