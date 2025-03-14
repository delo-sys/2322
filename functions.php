<?php

//PHP functions

//Functions are reusables blocks of code that perform specific tasks.They help organise your code ,reduce repetition and make your program more modular and mainainable

//1. Basic function definitions
//syntax
//function function_name () {
//    code to execute
//}

function sayHello() {
    echo "Hello, world<br>";
}

//Calling (invocking) a function
sayHello(); //Outputs: Hello, world;

//Function with parameters
//Parameters allow you to pass data into functions
function great ($name) {
    echo "Hello, $name <br>";
}

//Calling with an argument
great("Junior");
great("Heze");
great("Salo");
great("Prezo");

//Functions with return value
//The return statement ends the functions and sends a value back
function add($a, $b) {
    $result = $a + $b;
    return $result; //Function execution stops there
    echo "This will never execute"; //unreachable
}

//capturing the return value
$sum= add(8, 2); //sum know contains 10
echo "The sum is:$sum <br>";

//Early returns for conditional logics
function checkage($age) {
    if ($age <=0) {
       return "Invalid age<br>"; //Early return for invalid logic
    }

    if ($age <18) {
    return "Minor<br>";
    } else {
    return "adult<br>";
     }
}

$status = checkage(20);
echo "you are a $status<br>";

$myage = -17;
$invalidAge = checkage($myage);
echo "$myage is $invalidAge<br>";

//Create a function that takes an integer and returns the power of the first integer raised to the second integer
function power($base, $exponent) {
    return $base ** $exponent;
}
$x =2;
$y = 3;
echo "The power of $x raised to $y is:" , power ($x, $y) ."<br>";

//2.Function parameters
//Required parameters
function multiply($a, $b) {
    return $a * $b;
}

//Multiply(); //Error- missing required parameters

//Optional parameters
function powerofnumbers($base, $exponent =1){
    return $base ** $exponent;
}

echo powerofnumbers(4)."<br>"; //16 (4**4)- uses default exponent
echo powerofnumbers(2,3). "<br>"; // 8 (2**3) -ovverides default exponent

//Named arguments (PHP8.8+)
//Allow specifying arguments by name, improving readability
function createuser($name, $email, $role= 'user', $active= true) {
    //function body
}

//Using named arguments
createuser(
    name: "Junior Heze",
    email: "heze@gmail.com",
    active: false
    //role ommited will usedefault
);

//Type declarations (PHP 7.0+)
//Ensures parameters are of the specified type
function divide(float $a, float $b): float{
    if ($b== 0) {
        throw new Execution ("Division br zero");
    }
    return $a / $b ;
}

//Nullable Types (PHP 8.0+)
//Allow parameters to be null
function finduser(?int $id): ?array {
    if ($id == null){
      return null; 
}
// code to find user
}


//Variable length argument  lists
//The ...Operator (splat/rest operator) allow accepting any number of arguments
function sum(...$numbers) {
    $total = 0;
    foreach ($numbers as $number) {
        $total+=$number;
    }
    return $total;
}

echo sum(1, 2, 3, 4, 5) . "<br>"; //15

//passing arrays arguments
function calculateaverage(array $numbers) {
    $total = array_sum($numbers);
    $count = count($numbers);
    return $count >0 ? $total /$count :0 ;
}

$scores = [45,92, 78,99 ,80];
echo calculateaverage($scores); //78.8









