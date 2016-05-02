<html>
<body bgcolor="	#4d0000">
<table width="800" height="780" border="20" align="center" cellpadding="15" cellspacing="10" bgcolor="#ac5353">
    <tr>
        <form name="form1" method="post" action="Armstrong.php">
            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#6666ff">
                    <tr>
                        <td align="center" colspan="3"><b><h1>Perform Calculation On Just One-Click</h1></b></td>
                    </tr>
                    <tr>
                        <td width="350">Please Enter a number which you want to know Armstrong or not</td>
                        <td width="60">:</td>
                        <td width="100"><input name="number" type="text" id="number" required></td>
                    </tr>
                    <tr>
                        <td align="center"><input type="submit"  name="Calculate" value="Check Now"></td>
                        <td><input type="reset" value="Reset" class="button"></td>
                    </tr>
                    <!--<tr>
                        <td width="350">The given number is : </td>
                        <td width="60">:</td>
                        <td width="100"><input name="number" type="text" id="number" <?php echo"$number" ?></td>
                    </tr>-->
                </table>
            </td>
        </form>
    </tr>
</table>
</body>
</html>
