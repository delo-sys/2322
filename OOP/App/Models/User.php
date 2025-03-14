<?php

//Namespaces and Autoloading

//Name spaces help organise code and avoid  naming conflicts
//Autoloading automaticly loads class files when needed

//File -App/Models/User.php

namespace App\Model;

class User {
    private $id;
    private $name;

    public function __construct($id, $name){
        $this->id = $id;
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}