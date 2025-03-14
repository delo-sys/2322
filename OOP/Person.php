<?php

//class definition 
class Person {

    //Properties (attributes)
    public $name;
    public $age;

    //Constructor initializes the object
    public function __construct($name,$age) {
        $this->name = $name;
        $this->age = $age;
    }

    //Methods - (function inside a class)
public function greet() {
echo "Hello, my name is {$this->name} and i am {$this->age} years old .";
}


//Another method
public function haveBirthday() {
 $this ->age++;//increment age by 1
 return "Happy Birthday! Now I am {$this->age} years old .";
}
}
//Creating objects (instances of the class)
$john = new Person("John", 30); //creates a new person objeect
$jane = new Person ("Jane", 25); //creates another person object

//Accesing properties
echo $john->name . "<br>"; //output John

//Calling methods
echo $john->greet() . "<br>";//ouput:Hello my name is John and I am 30 years old
echo $jane->haveBirthday() . "<br>"; // Output :Happy Birthday ! Now i am 26 years old
 

//Checking instance type
if ($john instanceof    Person ) {
    echo "John is a Person object <br>";

}
/**
 * Things to understand about classes and objects
 * -Classes define structure and behaviour
 * - Objects are specific instances with their own property values
 * - The $this keyword refers to the current object instance
 * -Methods are functions that belong to a class
 * - The constructor is a special method called when creating objects
 */