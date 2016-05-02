
<html>
<body bgcolor="	#4d0000">
<table width="800" height="780" border="20" align="center" cellpadding="15" cellspacing="10" bgcolor="#ac5353">
    <tr>

            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                    <form name="form1" action="#" method="post" >
                    <tr>
                        <td align="center" colspan="3"><b><h1>Perform Calculation On Just One-Click</h1></b></td>
                    </tr>
                    <tr>
                        <td width="350">Please Enter a number which you want to know prime or not</td>
                        <td width="60">:</td>
                        <td width="100"><input name="number" type="text" id="number"></td>
                    </tr>
                    <tr>
                        <td align="center"><input type="submit"  name="Calculate" value="Find Now"></td>
                    </tr>
                    <!--<tr>
                        <td width="350">The given number is : </td>
                        <td width="60">:</td>
                        <td width="100"><input name="number" type="text" id="number"></td>
                    </tr>-->
                </table>
            </td>
        </form>
    </tr>
</table>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: Vaibhav Mishra
 * Date: 29-04-2016
 * Time: 17:00
 */
extract($_POST);
echo $number;
if($_POST){
    $num=$_POST["number"];
    echo $num;
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