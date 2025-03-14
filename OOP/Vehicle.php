<?php

// inheritance 
// inheritance allows a class to inherit properties and method from another class

// parent class(base class)
class vehicle{
    protected $make;
    protected $model;
    protected $year;
    protected $fuellevel = 100;

    public function __construct($make,$model,$year) {
        $this->make=$make;
        $this->model=$model;
        $this->year=$year;
    }

    public function getmakemodel(){
        return "{$this->year} {$this->make} {$this->model}";
    }

    public function drive ($distance) {
        $this->fuellevel-=$distance*0.1;// simplyfied fuel consumption
        return "drove{$distance}miles . fuel remaining; {$this->fuellevel}%";
    }
}

// child class (inherits from vehicle)
class car extends vehicle{
    private $numdoors;

    public function __construct( $make, $model , $year ,$numdoors){
        parent ::__construct($make, $model , $year);
        $this->numdoors=$numdoors;
    }

    // additional method specific to cars 
    public function honk (){
        return "Beep beep!";
    }

    // override the parent's drive method 
    public function drive ($distance){
        $this->fuellevel-=$distance *0.05;// cars are more fuel efficient
        return "car drove {$distance}miles . fuel remaining : {$this ->fuellevel}% ";
    }
}

// another child class 
class truck extends vehicle {
    private $cargocapacity;

    public function __construct ($make,$model,$year,$cargocapacity) {
        parent ::__construct($make, $model , $year);
        $this->cargocapacity=$cargocapacity;
    }
    public function loadcargo ($amount){
        return "{{$amount}lbs of cargo . capacity:{$this ->cargocapacity}";
    }

    // override the parent's drive method 
    public function drive ($distance) {
        $this-> fuellevel -= $distance *0.15;//trucks use more fuel
        return "truck drove {$distance} miles . fuel remaining : {$this->fuellevel}%";
    }
} 

$car = new car ("toyota", "corolla", 2020,4);
echo $car->getmakemodel(). "<br>";// from parent class - output :2020 toyota corolla 
echo $car->honk(). "<br>";// from parent class - output Beep beep!
echo $car->drive(10) ."<br>"; // overide method car drove 10 miles . fuel remaining :99.5%

$truck = new truck ("ford", "F-150", 2019,2000);
echo $truck ->getmakemodel()."<br>";//from parent class 
echo $truck->loadcargo(1500)."<br>";//from parent class 
echo $truck->drive(10)."<br>";// overridden method - uses more fuel
/**
 * key inheritance properties 
 * - child clsses inherit all non-private properties and methods from parent
 * - child classes can add their own properties and methods 
 * - child classes can override parent  methods to change behaviors 
 * -the parent::'keyword access the parent class methods 
 * - a classes con only extends one parent class (single inheritance)      
 */
