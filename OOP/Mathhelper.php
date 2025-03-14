<?php

//Static properties and methods
// static members belong to the class itself not to any specific instance

class Mathhelper{
    //static property - shared accross all instances
    public static $pi = 3.14159;

    //static counter to track instances
    private static $instanceCount = 0;

    public function __construct(){
        //Increment counter when a new object is created
        self::$instanceCount++;
    }

    //Static method - can be called without creating an object
    public static function square($number) {
        return $number * $number;
    }

    //Static method using static property
    public static function circleArea($radius) {
        return self::$pi * self::square($radius);
    }

    //static method to access private static property
    public static function getInstanceCount(){
        return self::$instanceCount;
    }

    //Non-static method
    public function displayInfo(){
        //Accesssing static property from non-static method
        return "pi value:" .self::$pi;
    }
}
    // Accessing static property directly (pi)
    echo MathHelper::$pi . "<br>"; //Accessing  static property directly
    echo MathHelper::square(4) . "<br>"; // output : 16
    echo MathHelper::circleArea(5) . "<br>"; //output 78.321
    

    //Create Instances
    $helper1 = new MathHelper();
    $helper2 = new MathHelper();

    echo MathHelper::getInstanceCount() . "<br>"; //OUTPUT 3

    //static with inheritance
    class AdvancedMathHelper extends MathHelper{
        //Override static property (creates a new one , doesn't change parent)
        public static $pi = 3.1492347;

        public static function cubeVolume($side) {
            return self::square($side) * $side;
        }

        //use parent = static method
        public static function displayParentpi(){
            return parent::$pi;
        }
    }

    echo AdvancedMathHelper::$pi . "<br>"; //output:3.14159
    echo AdvancedMathHelper::cubeVolume(3). "<br>"; //output:27
    echo AdvancedMathHelper::displayParentpi(). "<br>";// output:3.14159
    


