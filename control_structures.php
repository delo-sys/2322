<?php

//Control structures in php

//control structures determine the flow of execution in your code based on different conditions and logic.They're the foundation of programmming logic that allow your script to make decisions and repeat operations

//1.Conditional statements
//conditional statements executes differentcode blocks based on whether certain conditions are true of false

//1.if,elseif, Else
//The most fundamental way to make decisions in your code;
//BASIC if statement
//Syntax
//if (condition) (
//    code to execute if condition is true
// )

$age = 20;

if ($age >=18){
    //This code only executes if the condition is true
    echo "you are an adult <br>";
}    
   
//if else statement
//syntax
//if (condition)




$temperature = 15;

if ($temperature > 30) {
    //This code executes when the condition is true
    echo "It's hot outside! <br>";
} else {
    //This code executes when the condition is false
    echo "It's not hot outside! <br>";
 }
//if elseif else statement for multiple conditions
//allows checking multiple conditions in sequence
$grade =85;

if ($grade >= 90) {
     // first condition executes if grade is 90 or above
    echo "A - Excellent! <br>";
} else if ( $grade >=80) {
    // second condoition only checks if first condition is false
    //example if grade is between 89 - 90
    echo "B -Good job <br>";
} else if ($grade >=70) {
    //third condition -only checks if all previous conditions are false
    echo "C -satisfactory! <br>";
} else if ($grade >= 60) {
    //Fourth condition -only checks if all previous conditions are false
    echo "D -you passed but you can do better <br>";
} else {
    //Default case-executes if all conditions above are false
    //in this case if grade is below 60
    echo "you need to do better <br>";
}

/** 
 * Important notes
 * -conditions are evaluated from top to bottom
 * -once condition is true,it's code block executes and PHP skips all remaining conditions
 * the else block is optional and provides a default case
 * You can have as many elseif blocks as needed
 */

 //nested if statement-placing if statement inside other if statement
 $isloggedin = true;
 $isAdmin = true;

 if($isloggedin) {
    //These condition -checks user if is logged in
    echo "welcome back! <br>";
     if($isAdmin) {
        //
        //Checks if the logged in user is an Admin
        echo "you have administrator priviledges <br>";
     }else {
        //executes if user is logged in and not an Admin
        echo "you have user priviledges <br>";

     }
    }else {
        //executes if user is not loggrd in
        echo "please log in to continue <br>";

    }
    //  switch statement
    //The switch statememnt  provides an elegant way to compare a variable against any different values

    //switch syntax
    // switch (expression) (
    //     case value:
    //     code;
    //     break;
    //     default:
    //     code;
    // )

    $dayoftheweek = date("l"); //Gets the current day name (e.g monday)

    //echo $dayoftheweek;

    switch ($dayoftheweek) {
        case "Monday";
        //Executes if $dayoftheweekequals "Monday" (looks comparison)
        echo "It's the start of the work week <br>";
        break; //The break staetement prevents 
        case "Tuesday";
        case "Wednesday";
        case "Thursday";
        //Multiple cases without break statememnts will "fall through"
        //This executes if$dayoftheweek is any of these three values
        case "saturday";
        case "sunday";
        echo "It's the weekend <br>";
        break;
        default;
    }
    /** 
     * Important notes
     *  switch uses loose
     * without break, executes "false through" to the next case
     * The defaults case is optional
     * Switch is often clearer than multiple elseif statement when comparing on values
     */

     //1.3 ternary operators comparison
     // shortened way to write simple if statements
     //syntax
     //condition ; value_if_true : value_if_false
     $age =20;

     $status = ($age >=18) ? "adult" : "minor";
     echo "you are an $status <br>";

     //Equivalent if statement
     //if ($age>=18) (
    //  $status = "adult";
    //  ) else (
    //       $status = "minor";
    //)

    //Nested ternary operators (can be hard to read, use with condition)
    $scores =75;

    $grade = ($scores >=90) ?"A":
             (($scores >=80) ?"B":
             (($scores >=70) ?"C" : "F"));

    echo "your grade: $grade <br>";
    
    /** 
     * Tips for ternary operators;
     * Best for simple conditions
     * use parenthessese for clarity
     * Avoid deep nesting- it makes code harder to read
     * Don't use for complex logic -use if/else instead
    */


    //3 LOOPS
    //LOOPS- allows you execute code repeatedly based on certain conditions, making respective tasks more efficient

    //2.1 While loop
    //Executes code as long as the specified condition is true
    //syntax
    //while (condition) (
    //    code to execute
    //)

    $counter =1;

    while ($counter <=10) {
        //This code repeats as long as the condition is true
        echo "count; $counter<br>";
        $counter++; //increment counter -CRUICAL to avoid infinite loops
    }

    /**
     * Important notes
     * The condition is evaluated before each iteration
     * If the condition is false initially the loop never executes
     * Always ensure the loop condition will eventually become false
     * Be careful to avoid infinite loops when condition never become false
     */

    //Example using while to process data untill a condition is not
    $done =false;

    while (!$done) {
        //simulates same condition that might change loops to true
        $randomNumber =rand (1,10);
        if ($randomNumber >8) {
        echo "Found a number greater than 8: $randomNumber <br>";
        $done = true; //This will exit the loop
    } else {
        echo "still Looking ... Got: $randomNumber<br>";
    }
    }
    

   //Example Reading data from a file untill end of file
   $file = fopen("data.txt","r");
   while (!feof($file)) {
    //
    $line = fgets($file);
    echo $line . "<br>";
   }

   fclose($file);

   //Alternative syntax (for templates)
   while($Condition):
        //code to execute
   endwhile;

   // 2.2 Do while loop
   //Similar to while,but guaranteses that the execute at least once because the condition id checked after the execution
   //syntax
   //do {
   //    code to execute
   //}while (condition);

   $counter =1;

   do {
    //The code block executes first, then the condition is checked
    echo "count: $counter <br>";
    $counter++;
    } while ($counter <5);

   /**
    * key differences from while loop
    * code always executes at least once, even if the condition is initially false
    *condition is checked at the end of each iteration
    *Appropriate when you need to process something at least once
    */
  
    //Example ;Validating user input
    // do {
    //     $input =getinput (); //Assume this function gets input user input
    //     $valid = validateinput($input); //Assume this validate the input

    //     if (!$valid) {
    //         echo "Invalid input, please try again.";
    //     }
    //     }while (!$valid); //keep asking until valid input is provided

    //Example where loop body executes despite condition being false
    $number =10;
     do {
        echo "This runs onceeven though the condition is false <br>";
      } while ($number <5);

     //2.3 For lopp
     //Used when you know the number of iteration in advance
     //syntax
     //  for (initialization;condition;increment/decrement) {
     //  code to execute
     //}

     //1. initialization -runs once at the begining
     //2. condition - checked before each iteration
     //3.increment /decrement -runs after each iteration

     for ($i =1; $i <= 5; $i++) {
        echo "iteration : $i<br>";
     }

     /**
      * How the fpr loop works
      *1. initializing $i =1
      *2 Check if $i <=5 (true)
      *3. execute the loop body
      *4. increment $1 ($i become 2)
      *5.check if $i <= 5 (true)
      *6. Executes the loop body
      *...and 
      */

    //ommiting parts of a for loop
    $i = 4;
    For(; $i < 5;) {
        echo "$i  <br>";
        $i++;
    }

    //Using for loops with arrays
    $fruits = ["apple","banana","orange","grape","mango"];
    $fruitCount = count($fruits);

    For ($i =0; $i < $fruitcount; $i++) {
    }

    //Altenartive syntax (for templates)
    for ($i =0; $i < 10; $i++):
        //code
    endfor;
    /**
     * When to use fpr loops
     * When you know the exact number of iteration in advamce
     * for mathematical importance
     * When you have a counter variations
      */ 

      //2.4 Foreach loop
      //Specifically (array_expression as $value) {
      //    code
      //}

      //or
      //foreach(array_expression as $key or $value) {
      //   code
      //}

      //Basicforeach on indexed array
      $colors = ["red", "green","blue"];

      foreach ($colors as $color) {
        //$color takes the value of each array almost in sequence
        echo "color: $color<br>";
      }

      /**
       * How it works:
       * 1. First iteration; $color ="red"
       * 2. Second iteration; $color = "green"
       * 3. Third iteration ; $color = "blue"
       */

       //Foreach with key => value as assosiative array
       $person = [
           "name" => "heze",
           "age" => 30,
           "city" => "new york"

       ];

       foreach($person as $key => $value) {
          //$key contains the array  (e.g "name")
          //$value contains the corresponding value (e.g "john",30)
          echo "$key: $value<br>";
       }

       //Iterating array nested array
       $users =[
           [ "name" => "Alice", "email" => "alice@gmail.com"],
           [ "name" =>"Bob", "email" => "bob@gmail.com"],
       ];

       foreach ($users as $user) {
        echo "name" ,$user["name"] ,"email:", $user["email"],"<br>";
       }

       //Alternative syntax
       foreach ($array as $value) :
            //code
       endforeach;

       /**
        * advantages of for each
        * No need to initialize counters 
        *works with any array type  (indexed, assosiative,initializationals)
        *More readable and less prone to errors
        *Automatically handles the correct number of iterations
        */

        //2.5 loop Control structures
        //$statments that change the normal flow of loops
        //break -exits the loop immediately
        for ($i =1; $i<=10; $i++)  {
            if ($i==5) {
            echo "Breaking at 5 $i<br>";
            break; // Immediately exits the loop when $iequal 5
            }
            echo "iteration; $i<br>";
        }

        //After the break,execution continues with the code after the loop

        //condition staetment - skips the next of the current iteration
        for($i = 1; $i <= 10; $i++) {
            if ($i % 2 ==0 ) {
                continue; //skip even numbers
            }echo "odd number: $i<br>";
        }

        //After the continue, the loop jumps to the next iteration

        /**
         * Best practices
         *  Uxse break when u find what you are looking for or mate termination condition
         * Use continue to skip iterations that don't meet certain criteria
         *  Avoid excesive use of break and continue as they can make code harder to folow 
         */

         //1.include and require statements
         //These statements allow you to include code from other files preventing code reuse and organization

         //Include -Includes and evaluates the specified file
         include "header.php";
         //If file doesn't exist, include produces a warning  but script continyes

         //Include_once -Includesthe file only once
         include_once "functions.php";
         //If the file already included, if won't be included again 
         //Useful for functions or class definitions to avoid errors

         //Requires -Similar to include but produces  a fatal erroe if the file doesn't exist
         require 'config.php';
         //Script will stop if file is not found - use when the file is absolutely necessary

         //require_once - requires the file alone
         require_once 'database.php';
         //Ftal erroe if not fouund, include only once
         //Most commonly used for critical class definitions

         /**
          * When to use each
          *Use required when the file is critical to the application
          *Use include when the file is optional
          *Use _once versions when the file contain functions or classes to prevent redefination errors
          *
          *Paths
          *Relative  paths are relative to the current script
          *Absolute paths start from the file system root
          *You can use variables in path include $file_path
          */

          //Example of a common directory structures and includes
          require_once 'config/database.php'; //Database configuration
          require_once 'include/functions.php';//helper functions
          include 'templates/header.php';     //site header (HTML)

          //Content goes hard

          include 'templates/footer.php';     //site footer (HTML)

          //Functions




