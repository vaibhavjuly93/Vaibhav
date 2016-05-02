<?php
/**
 * Created by PhpStorm.
 * User: Vaibhav Mishra
 * Date: 29-04-2016
 * Time: 16:50
 */

if($_POST){
    $n=($_POST["number"]);
}
    //$n=6;
    $fact=1;
    for($c=1;$c<=$n;$c++)
        $fact=$fact*$c;
    echo "The factorial of given number $n is :  $fact" ;

?>