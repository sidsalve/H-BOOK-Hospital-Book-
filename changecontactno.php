<html>
<body background="01422_summersky_1920x1200.jpg">
<?php
SESSION_START();
mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error()); 
$conh=$_REQUEST["conh"];
if($conh=="")
{
echo "<script>alert('Please Fill all Fields')</script>";
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
$q=mysql_query("update reg set contactno='$conh' where emailid='$p'");
echo"<h3>Hello</h3><h4>CONTACT NUMBER IS CHANGED SUCCESSFULLY....</h4>";
echo"Your New Contact Number is:<b>$conh<b>";
}
}
?>
</body>
</html>