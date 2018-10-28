<html>
<body background="01422_summersky_1920x1200.jpg">
<?php
SESSION_START();
mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error()); 
$ns=$_REQUEST["nightservice"];
if($ns=="")
{
echo "<script>alert('Please Choose Night Service')</script>";
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
$q=mysql_query("update reg set nightser='$ns' where emailid='$p'");
echo"<h3>Hello</h3><h4>NIGHT SERVICE IS CHANGED SUCCESSFULLY....</h4>";
echo"Your Provide Night Service?:<b>$ns<b>";
}
}
?>
</body>
</html>