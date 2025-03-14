<?php

// Visibilty and access modifiers
// Access modifiers control how properties and methods can be accesed

class BankAccount{
    // Private properties -nly accessible within the class
    private $accountNumber;
    private $balance;

    // protected property - accessible within this class and child classes
    protected $type;

    // Public - accessible from anywhere 
    public $ownerName;

    // Constructor
    public function __construct($ownerName, $accountNumber, $initialBalance){
        $this ->ownerName = $ownerName;
        $this ->accountNumber = $accountNumber;
        $this ->balance = $initialBalance;
        $this ->type = "Standard";
    }
    // Public method - can be called from anywhere
    // a method to deposit funds return true if amount is greater than zero otherwise false
    public function depositFunds($amount){
        if ($amount > 0){
            $this ->balance += $amount;
            return true;
        }
            return false;
        
    }

    public function withdraw($amount){
        if($amount > 0 && $this ->hasSufficientFunds($amount)){
            $this ->balance -=$amount;
            return true;
        }
        return false;

    }

    // private method - only accessible within this class
    private function hasSufficientFunds($amount){
        return $this ->balance >= $amount;
    }

    // Public method to acess private property
    public function getBalance(){
        return $this->balance;

    }

    // protected function - accessible in this class and child classes
    protected function changeType($newType){
        $this ->type =$newType;
    }

}

$account =new BankAccount("John Smith", "12345",1000);

// this works - public property
echo $account->ownerName."<br>"; 

// this would cause error - private function
// echo account ->hasSufficientFunds 
echo $account->getBalance() ."<br>"; // output :1000

$account->depositFunds(500);

echo $account->getBalance(). "<br>";//output :1500
// $account->hasSufficientFunds(100);

/**
 * access modifiers explained :
 * - public :accessible from anywhere 
 * - private : accessible only within the class itself 
 * - protected :accessibile within the class and any child class 
 * 
 * this concept id known as encapulation - hiding internal state and requiring all interarction to be through public methods.  
 */

//  next - inheritance (create a new file called vehicle.php)