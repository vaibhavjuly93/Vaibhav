<?php
/**
 * Created by PhpStorm.
 * User: Vaibhav Mishra
 * Date: 29-04-2016
 * Time: 19:13
 */
if($_POST){
    $n=($_POST["number"]);
}

$arm=0;//$n=151;
$temp=$n;
while($n!=0)
{
    $rem=$n%10;
    $n=$n/10;
    $arm=$arm+$rem*$rem*$rem;

}
if($temp==$arm)
{
    echo "The given number is Armstong : $temp";
}
else
{
    echo "The given number is not Armstong : $temp";
}
?>