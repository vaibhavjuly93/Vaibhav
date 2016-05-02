<?php
/**
 * Created by PhpStorm.
 * User: Vaibhav Mishra
 * Date: 29-04-2016
 * Time: 17:00
 */
if($_POST){
    $num=($_POST["number"]);
}
{
    $count = 0;
    //$num = 7;
    for ($i = 2; $i <= $num/2; $i++) {
        if ($num % $i == 0) {
            $count++;
            break;
        }
    }
    if ($count == 0 && $num != 1)
        echo "The given number is a Prime Number : $num";
    else
        echo "The given number is not Prime Number : $num";
}
?>