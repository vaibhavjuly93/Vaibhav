<?php
/**
 * Created by PhpStorm.
 * User: Vaibhav Mishra
 * Date: 29-04-2016
 * Time: 15:59
 */
//$n=151;
if($_POST){
    $val=($_POST["number"]);
}

if($val % 2 == 0)
{
    echo "The given number is Even : $val";
}
else
{
    echo "The given number is  Odd : $val";
}
?>