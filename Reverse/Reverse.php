<?php
/**
 * Created by PhpStorm.
 * User: Vaibhav Mishra
 * Date: 29-04-2016
 * Time: 16:30
 */
if($_POST){
    $n=($_POST["number"]);
}

    $reverse=0;
    //$n=12;
    $temp=$n;
    while ($n >= 1) {
        $rem = $n % 10;
        $reverse = $reverse * 10 + $rem;
        $n = $n / 10;
        //echo $n;
        echo "<br>";
    }
        echo "The given number $temp and the Reverse is  : " . $reverse;

?>