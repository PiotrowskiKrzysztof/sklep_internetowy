<?php
 session_start();  
 require_once('../mainClass.php');
 require_once('../shopClass.php');
 require_once('../settings.php');

 class basket extends shop{

    var $id = 0;
    var $price = 0;

    function getInputs(){
        // wczytuje z url
        $this->id = $_GET['id'];
        $this->price = $_GET['price'];
    } 

 function printOutput(){

    $this->getInputs();

    //echo 'dodałem '.$this->id.' za '.$this->price.'('.time().')';
    $this->addToTrolley($this->id,$this->price);

     echo $_SESSION['trolley_price']. ' zł';
     $this->debug($_SESSION);
 }

 }
 
 
 $b = new basket();
 $b -> SQLConnect($sqlConfig);
 $b -> printOutput();

?>