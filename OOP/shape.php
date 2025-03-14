<?php
//Abstract class-Cnnot be instantiated
//Abstraction allow you to define what class must do without specifyimg how they do it
abstract class Shape{
    protected $color;

    public function __construct($color) {
        $this->color;
    }

    //Regular method -Fully implemented
    public function getcolor() {
        return $this->color;
    }

    //Abstaract method - Must be implemenyed by the child class
    abstract public function calculateArea();

    //abstract method with parameters
    abstract public function draw($canvas);
}

class circle extends Shape{
    private $radius;

    public function __construct($color , $radius) {
        parent:: __construct($color);
        $this->radius = $radius;
    }

    //Implementation of abstract method
    public function calculateArea() {
        return pi()* $this->radius * $this->radius;
    }

    //Implementation of the abstract method with parameters
    public function draw($canvas) {
        return "drawing a ($this->color) cicrle with radius ($this->radius) on ($canvas)";
    }
}

class Rectangle extends Shape{
    private $width;
    private $height;

    public function __construct($color , $width, $height) {
        parent:: __construct($color);
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea() {
        return $this->width * $this->height;
    }

    //Implementation of the abstract method with parameters
    public function draw($canvas) {
        return "drawing a ($this->color) rectangle (($this->width) *
        ($this->height)) on ($canvas)";
    }
}

//Using the classes
// $shape = new Shape("red"); //error - cannot instantiate an abstract class

$circle = new Circle("blue", 5);
echo $circle->calculateArea()."<br>"; // output ; 78.4
echo $circle->draw("HTML5 Canvas")."<br>";

$rectangle = new Rectangle("red",7, 5);
echo $rectangle->calculateArea()."<br>"; // output ; 35
echo $rectangle->draw("HTML5 Canvas")."<br>";

//Interface - define a contract that classes must fulfill
interface Loggable {
    //Interface methods are abstract by default
    public function logInfo();
    public function getLogType();
}

//interface for printable objects
interface Printable {
    public function printOutput();
}

//class implementing multipleinterface
class User implements Loggable, Printable{
    private $username;
    private $email;

    public function __construct($username, $email) {
        $this->username = $username;
        $this->email = $email;
    }

    //Implementing loggable interface method
    public function logInfo() {
        return "user: ($this->username), email: ($this->email)";
    }

    public function getLogType() {
        return "USER_LOG";
    }

    //iMPLEMENTING printable interface method
    public function printOutput(){
        return "username: ($this->username)\nemail: ($this->email)";
    }
}

$user = new user("johndoe","john@gmail.com");
echo $user->logInfo() . "<br>";
echo $user->printOutput() . "<br>";

/**
 * Key concepts
 * Abstract classes can have both abstaract and concrete mehtods
 * Abstract methods must be implemented by this class
 * Classes can implement  multiple interaface (unlike innheritance)
 * interface  contain only method declaration , or implementation
 * interface create  a "contract" that implementing classes must 
 */

 