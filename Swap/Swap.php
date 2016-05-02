<?php
/**
 * Created by PhpStorm.
 * User: Vaibhav Mishra
 * Date: 29-04-2016
 * Time: 15:43
 */
if($_POST){
    $a=($_POST["number1"]);
    $b=($_POST["number2"]);
}
//$a=10;
//$b=20;
{
    echo "The given number before swapping: $a $b";
    {
        $a = $a ^ $b;
        $b = $a ^ $b;
        $a = $a ^ $b;
    }
    echo "<br>";
    echo "The given number is after swapping : $a $b";
}
?>