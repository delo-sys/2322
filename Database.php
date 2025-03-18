<?php

class database {
    private static $istance = null;
    private $conn;

    // private constructor 
    private function __construct () {
        // get credientials from a secure location 
        $config = include 'config/database.php';

        try {
            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
            $this->conn = new PDO($dsn,$config['username'],$config['password'],[
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES =>false,
            ]);
        }catch (PDOExpection $e){
            die("connection failed:".$e->getmessage());
        }
    }

    // et database instance
    public static function getinstance() {
        if (self::$istance==-null){
            self:: $istance= new self;
        }
        return self :: $istance;
    }

    // get the PDO connection 
    public function getconnection(){
        return $this->conn;
    }
}

// Basic CRUD operations
// CURD stands for create , read , update and delete - the four basic operations performed on database records

// create (INSERT)
function createuser($pdo,$username,$email,$password){
    // hash the password for security
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);

    try {
        // prepare the SQL statement
        $stmt = $pdo->prepare("
            INSERT INTO users(username,email,password,create_at)
            VALUES(:username, :email, :password, NOW())
            ");
        // bind parameters
        $stmt->bindparam(':username',$username);
        $stmt->bindparam(':email',$email);
        $stmt->bindparam(':password',$hashed_password);

        // execute the statement
        $stmt->execute();

        // get the ID of the newly created user
        return $pdo->lastInsertId();

    } catch (PDOException $e){
        echo "error creating user:". $e->getmessage ();
        return false;
    }
}

// usage 
$db= DataBase::getinstance();
$pdo=$db->getconnection();

// $newuserId = createuser($pdo,"Delo","delo@example.com","secure_password123");

// if ($newuserId){
//     echo "user created with ID :". $newuserId;
// }

function createproduct($pdo,$name,$price,$description,){
    try{
        $stmt=$pdo->prepare("
        INSERT INTO product(name,price,description,created_at)
        VALUES (:name,:price,:description,NOW())
        ");

        // Execute with associative array
            $stmt->execute([
                ':name'=>$name,
                ':price'=>$price,
                ':description'=>$description
            ]);

            return $pdo->lastInsertId();
        } catch (PDOException $e){
            echo "error creating product:". $e->getmessage();
            return false;
        }
    }

    // useage : create sereval products
    $productId=createproduct($pdo, "smartphone", 599.99 ,"latest model with advance features");

    if ($productId){
        echo "product created with ID:". $productId;
    }