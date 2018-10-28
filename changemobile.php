<html>
<body background="01422_summersky_1920x1200.jpg">
<?php
SESSION_START();
mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error()); 
$mobile=$_REQUEST["mobile"];
if($mobile=="")
{
echo"<script>alert(' Please Fill All Fields')</script>";
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
$q=mysql_query("update reg set mob_no='$mobile' where emailid='$p'");
echo"<h3>Hello</h3><h4>MOBILE NUMBER IS CHANGED SUCCESSFULLY....</h4>";
echo"Your New Contact Number is:<B>$mobile</B>";
}
}
?>
</body>
</html>