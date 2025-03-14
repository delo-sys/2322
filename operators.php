<?php 

//

//1.Arithmetic operators
//These operators perform basic mathematical operations
echo " <b>1.Arithmetic operators</b> <br>";

//addition (+)
$sum =10+5; //Result;15
echo "sum;$sum, <br>";

//subtraction (-)
//The subtraction operation subtracts the right oparend from the left oparend
$difference = 10-5; // Results;5
echo "difference =$difference <br>";

//multiplication(*)
//The multiplication operation multiplies two values
$product =10 * 5; //Result: 50
echo "product;$product <br>";

//Division(/)
// The division operation divides the left oparend by the right oparend
// Note: Dividion by zero will cause a total error
$quotient =10/5; //Result 2
echo "quotient;$quotient <br>";

//Modulus (%)
// The modulus operator returns the reminder of a division 
// 10 divided by 3 equals 3 with a reminder of 1
$reminder =10 % 3; // Result 1
echo "reminder;$reminder <br>";

//exponatiation (**) =PHP 5.8+
//Raises the left operand to the power of the right operand
//2 raised to the power of ^3 equals 
$power =2**3; // Resuls;8
echo "power;$power <br>";

//Integer division (intdiv)
//returns the integer quotient of the division 
//10 divided by 3 gives 3 (decimal is truncated)
$intdivision =intdiv(10, 3); //result; 3
echo "integer division; $intdivision <br>";


//Tommorrow -Assignment operators
echo "<b> 2.Assignment operators</b> <br>";
//This operators assign values to variables
//Basic assignment (=)
$x =10; // assign 10 to variable $x

//Combined assignment operators
$x =10;
echo "x = $x <br>";
$x +=5; //Equivalent to $x = $x +5; Results 15
echo "x +=5 is $x <br>";
$x -= 3; //Equivalent to $x =$x -3; Results 12
echo "x -=3 is $x <br>";
$x *= 2; //Equivalent to $x =$x *2; Results 24
echo "x *=2 is $x <br>";
$x /= 4; //Equivalent to $x =$x /4; Results 6
echo "x /=4 is $x <br>";
$x %= 4; //Equivalent to $x =$X %4; Results 2
echo "x %=4 is $x <br>";
$x **=3; //Equivalent to $x =$x **3; Results 8
echo "x **=3 is $x <br>";

//Combined operators
echo "<b> 3.Comparison operators</b> <br>";

//Comparison operators
//These operators compare two values and returns a boolean result (true or false)

//Equal(==)
echo var_dump(5 == 5) , "<br>";//bool(true)
echo var_dump(5 =="5") , "<br>"; //bool(true) //Values are equal after type juggling

//Identical (===)
echo var_dump(5 ==5) , "<br>"; //bool(true)
echo Var_dump(5== "5") , "<br>";//bool(false) -different values

//Not equal (!= or <>)
echo Var_dump(5!= 10) ,"<br>"; //bool(true)
echo var_dump(5 <> 10) , "<br>"; //bool(true) -alternative syntax

//Not identical (!==)
echo var_dump( 5 !=="5") , "<br>"; //bool(true) -different type

//Greater than (>)
echo Var_dump(10 >5) , "<br>"; //bool(true)

//Less than (<)
echo Var_dump(5 <10) , "<br>"; //bool(true)

//Greater than or equal to (>=)
echo Var_dump(10 >= 10) , "<br>"; //bool(true)

//Less than or equal to (<=)
echo Var_dump(5 <=5) , "<br>"; //bool(true)

//logical operators
//These operators perform logical operations on boolewan values -AND,OR,NOT,XOR

echo "<b> 4.Logical operators</b> <br>";
// 1. AND (&&,and) All oparends must be true to have a true result

echo var_dump(true && false); //bool(true)
echo var_dump(true && false); //bool(false)
echo var_dump(false && true); //bool(false)
echo var_dump(false && false); //bool(false)

//2. OR (||, or) -at least one of the oparends must be true
echo "<br>";
echo "<b><i>a. Logical OR (||, or)</i></b> <br>";

var_dump(true || true); //bool(true)
var_dump(true ||false); //bool(true)
var_dump(false ||true); //bool(true)
var_dump(false ||false); //bool(true)

//3.NOT (!, NOT)- Revsrses a condition 
echo "<br>";
echo "<b><i>b. Logical NOT (!, not)</i></b> <br>";
Var_dump(!true); //bool(false)
Var_dump(!false); //bool(true)
//var_dump(not true); //bool(true) alternative syntax

//4.XOR (xor)-exclusive OR,true if one is true,but not both
echo "<br>";
echo "<b><i>c. Logical Exclusive OR (xor)</i></b> <br>";
var_dump(true xor false); //bool(true)
var_dump(true xor true); //bool(false)

//5.String operators
//operators for working with strings
//Concartination (.)
echo "<br>";
$Firstname ="heze";
$Lastname ="junior";
$Fullname = $Firstname . $Lastname . '<br>';
echo "$Fullname";

//concartination assignment (.=)
$text = "hello";
$text .= "World"; //$text now contains hello world
$text .= "!"; //$text now contains "hello world"
echo $text , "<br>";

//Array operators
//operators for working with arrays
//Union(+)
$array1 =["a"=>"apple","b"=>"banana"];
$array2 =["b" =>"blue berry", "c" =>"cherry"];
$result = $array1 + $array2;
var_dump($result);
//Result; ["a"=>"apple", "b"=>"banana", "c" => "cherry"]
//Note;if keys exist in both arrays,the first array's values are

echo "<br>";
//Equality (==)
$array1 = [1, 2, 3,];
$array2 = [1, 2, 3,];
var_dump($array1 == $array2); //bool(true) -same key value pairs

//Identity (===)
$array1 = [1, 2, 3,];
$array2 = ["1","2","3"];
var_dump($array1 == $array2); //bool(false) -different types 

//Inequality (!= , <>)
var_dump($array1 != $array2); //bool(true) 

echo "<br>";

//Non-idfentity (!==)
var_dump($array1 !== $array2); //bool(true)

echo "<br>";

//Increment/Decrement operstors
//These operators increase or decrease variables by one
//Pre-increment (++)
$x =5;
$y = ++$x; //$x is incremented to 6, then assigned to $y
//$x is 6, $y is 6
echo $x . "<br>";
echo $y . "<br>";

//post-increment ($++)
$x = 5;
$y = $x++; //$x is assigned to $y, then incremented to 6
//$x is 6, $y is 5
echo $x . "<br>";
echo $x . "<br>";

//Pre-decrement (--)
$x = 5;
$y = --$x; //$x is decremented to 4,then assigned to $y
//$x is 4, $y is 4
echo $x . "<br>";
echo $x ."<br>";

//Post-decrement ($--)
$x =5;
$y =$x--; //$x is assigned to $y, then decremented to $y
//$x is 4,$y is 5
echo $x ."<br>";
echo $y . "<br>";

//Ternary operator (?;)
$age = 20;
$status =($age >= 18) ? "adult" : "minor";
//If condition is true, first value is returned;otherwise, secondvalue is returned
echo "$status <br>";

//operator precedence
//like in mathematics php operators have a specific order of precedence
//example showing precedence
$result = 5 + 3 * 2; //Result; 11 (not 16)
//multiplication has higher precedence than addition
echo "$result <br>";

//using parenthesses to overide precedence
$result = (5 +3)*2; //Result; 15
//parenthesses have the highest parameters
echo "$result <br>";

//precedence can cause unexpected behavior
$a =3;
$b =5;
if ($a + $b) //assign $b to $a, then evaluates to 5 (truthy)
    echo "This will always execute";
if ($a = $b)// Assigns $b to $, then evaluates to 5)

//The correct comparison would be ; if ($a == $b)
//operators are powerful tools to php that lets you  manipulate variables and perform calculations efficiently.Understanding how they work and their precedence is essential for writing correct and effective PHP code.

//Next->Control structures in PHP

?>