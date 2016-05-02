<?php
/**
 * Created by PhpStorm.
 * User: Vaibhav Mishra
 * Date: 29-04-2016
 * Time: 17:15
 */
//$n=6;
    function factorial($n = 6)
    {

        echo "Factorial of $n = ", factorial($n);
    }

    function factorial($n)
    {
        if ($n != 1)
            return $n * factorial($n - 1);
    }
/* $n=6;
    $fact=1;
    for($c=1;$c<=$n;$c++)
        $fact=$fact*$c;
    echo "The factorial of given number $n is :  $fact" ;*/

?>