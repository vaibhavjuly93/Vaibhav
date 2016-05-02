<?php
/**
 * Created by PhpStorm.
 * User: Vaibhav Mishra
 * Date: 29-04-2016
 * Time: 18:30
 */
if($_POST){
    $r=($_POST["number"]);
}
$i=0;$j=1;$k=2;//$r=10;
echo "The fabonacci series is : $i $j";
while($k<$r) {
    $f=$i+$j;
    $i=$j;
    $j=$f;
    echo " $j";
    $k++;
}
?>