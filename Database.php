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
            die("connection failed:".$e->getMessage());
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
function creatUser($pdo,$username,$email,$password){
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
        echo "error creating user:". $e->getMessage ();
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

    // if ($productId){
    //     echo "product created with ID:". $productId;
    // }

    // inserting multiple records at once 
    function createMulitpleRecord($pdo,$records){
    try{
        // begin transaction  for multiple inserts
        $pdo->begintransaction();

        $stmt=$pdo->prepare("
        INSERT INTO items (name,category,price)
        VALUES(:name,:category,:price)
        ");

        // insert each record 
        foreach($records as $record){
            $stmt->execute([
                ':name'=>$record['name'],
                ':category'=>$record['category'],
                ':price'=>$record['price']
            ]);
        }
    

    // comit the transacton
    $pdo->commit();
    return true;
    }catch (PDOException $e){
        // roll back if something went wrong
        $pdo->rollback();
        echo "Error creating records:". $e->getmessage();
        return false;
    }
    }
// usage
$items=[
    [
        'name'=>'laptop',
        'category'=>'electronics',
        'price'=>'999.99'
    ],
    [
        'name'=>'headphone',
        'category'=>'accesories',
        'price'=>'149.99'
    ],
    [
        'name'=>'mouse',
        'category'=>'peripherals',
        'price'=>'29.99'
    ]
];
// if (createMulitpleRecord($pdo,$items)){
//     echo "all items created successfully ";
// } 

//read (select)
// retriving  asingle record ID 
function getUserById($pdo,$userId){
    try{
        $stmt=$pdo->prepare ("SELECT Id,username,email,password,created_at FROM users WHERE id=:id");
        $stmt->execute([':id =>$userid']);

        // Fetch a single
        return $stmt->fetch();//return false if no record found 
    }catch(PDOException $e){
        echo "Error retrieving  user:". $e->getmessage();
        return false;
    }
}
// example usage 
// $user=getUserById($pdo,40);
// if ($user){
//     echo "Username:". $user['username'].", Email:". $user['email'];
// }else{
//     echo"user not found";
// }

// 2. Retrieving multiple records
function getAllUsers($pdo,$limit=10,$offset=0){
    try{
        $stmt=$pdo->prepare("
        SELECT * FROM users
        ORDER BY create_at DESC
        LIMIT :limit OFFSET :offset
        ");

        // bind parameter (must be bound as integers for LIMIT/OFFSET)
        $stmt->bindvalue(':limit', $limit,PDO::PARAM_INT);
        $stmt->bindvalue(':offset',$offset,PDO::PARAM_INT);
        $stmt->execute();

        // fetch all rows 
        return $stmt->fetchAll();
    }catch (PDOExeception $e){
        echo "Error retrieving users ". $e->getMessage();
        return[]; 
    }
}

// example usage 
// get 10 users from beignning(first page)
$users=getAllUsers($pdo);

// get 20 users from beignning(first page)
$users=getAllUsers($pdo,20);

// get 10 users from beignning(first page)
// $users=getAllusers($pdo,10,10);

// display users 
// foreach($users as $user ){
//     echo "Username: {$user ['username]}, email:{$users['email']<br>";
// }
// 3.  Retrieving with conditions 
function searchUsers($pdo,$searchterm){
    try{
        $searchterm = "%$searchterm%";// add wildcards for LIKE query

        $stmt = $pdo->prepare("
            SELECT * FROM users
            WHERE username LIKE :term1
            OR email LIKE :term2
            ORDER BY username
        ");

        $stmt->bindvalue(':term1',$searchterm,PDO::PARAM_STR);
        $stmt->bindvalue(':term2',$searchterm,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }catch (PDOException $e){
        echo "error retrieving users:". $e->getMessage();
        return [];
    }
}

// Example usage 
// search for users with "John Doe " in  username or email
// $searchresults = searchUsers($pdo, "john");

// // display search results
// if (count($searchresults) > 0){
//     echo"found " . count($searchresults) . "users:<br>";
//     foreach($searchresults as $user){
//         echo "Username:{$user['username']}, Email:{$user['email']}<br>";
//     }
// }

// 4.counting records
function countUsers($pdo){
    try {
        $stmt=$pdo->query ("SELECT COUNT(*) FROM users");
        return $stmt->fetchcolumn();
    }catch (PDOExecption $e){
        echo "error counting user:". $e->getMessage();
        return 0;
    }
}

// usage 
// $totalusers = countusers ($pdo);
// echo "total number of users: $totalusers";

// update (UPDATE)
// 1. Update (UPDATE) -> UPDATE table_name SET column_use = new_value;
function updateUser($pdo,$userId,$data){
    try{
        // build the set part of the query dynamically 
        $fields = [];
        $values = [];

        foreach ($data as $field => $value){
            $fields[] = "$field = :$field";
            $values[":$field"] = $value;
        }

        // add the user ID to values 
        $values[':id'] = $userId;

        $sql = "UPDATE users SET " . implode(", " , $fields). " WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt -> execute($values);

        // return number of affected rows
        return $stmt ->rowcount();
    }catch(PODException $e) {
        echo "error updating user: " . $e -> getMessage ();
        return false; 
    }
}

// usage
$updated = updateUser($pdo,1,[
    'username' => 'new_username',
    'email' => 'new_email@example.com'
]);

if ($updated){
    echo "user updated sucessfully . row affected:$updated";
} else {
    echo "no changes made or user not found ";
}