<html>
<body background="01422_summersky_1920x1200.jpg">
<?php
SESSION_START();
mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error()); 
$address=$_REQUEST["address"];
if($address=="")
{
echo "<script>alert('Please Fill All Information')</script>";
}
else
{
$q=mysql_query("select * from reg");
$n=0;
while($row=mysql_fetch_array($q))
{
if($row['emailid']=$_COOKIE["unme"])
{
$n=1;
}
}
if($n==1)
{
$p=$_COOKIE["unme"];
$q=mysql_query("update reg set address='$address' where emailid='$p'") or die(mysql_error());
echo"<h3>Hello</h3><h4>ADDRESS IS CHANGED SUCCESSFULLY....</h4>";
echo"Your New Address is:<b>$address<b>";
}
}
?>
</body>
</html>