<?php
/**
 * Created by PhpStorm.
 * User: Vaibhav Mishra
 * Date: 29-04-2016
 * Time: 17:45
 */
if($_POST){
    $n=($_POST["number"]);
}

$sum=0;//$n=1231;
$temp=$n;
while($n>=1) {
    $rem=$temp%10;
    $sum=$sum*10+$rem;
    $temp=$temp/10;
}
if($n==$sum) {
    echo "The given number is Palindrome : $n";
}
else {
    echo "The given number is not Palindrome : $n";
}
?>