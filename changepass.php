<html>
<body background="01422_summersky_1920x1200.jpg">
<?php
SESSION_START();
mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error()); 
$uname=$_REQUEST["uname"];
$_SESSION['name']=$_REQUEST["uname"];
$oldp=$_REQUEST["oldp"];
$newp=$_REQUEST["newp"];
$cpass=$_REQUEST["cpass"];

if($uname=="" || $oldp=="" || $newp=="" || $cpass=="")
{
echo"<script>alert('Fill All The Fields')</script>";
}
else
{
$q=mysql_query("select * from loge");
$n=0;
while($row=mysql_fetch_array($q))
{
if($row['name']==$uname || $row['password']==$oldp )
{
$n=1;
}
}
if($n==1)
{
if($cpass==$newp)
{
mysql_query("update loge set password='$cpass' where name='$uname'");
mysql_query("update reg set password='$cpass' where emailid='$uname'");
mysql_query("update loge set cpassword='$cpass' where emailid='$uname'");

echo"<br><br><br><center><h3>Hello</h3><h2>".$_SESSION['name']."</h2><h4>PASSWORD CHANGED SUCCESSFULLY....</h4></center>";
echo"<center>Your New Password is:</center><br>";
$q1=mysql_query("select * from loge where name='$uname'");
echo"<table border=1 align=center><tr><th>User Id</th><th>password</th></tr>";

while($row=mysql_fetch_array($q1))
{
echo"<tr><td>".$row['name']."</td>";
echo"<td>".$row['password']."</td></tr>";
}
echo"</table><br>";
}
else
{
echo"<script>alert('NEW password DO NOT MATCH with CONFORM PASSWORD')</script>";
echo"<a href=login.html>BACK TO LOGIN PAGE</a>";
}
}
else
{
echo"Wrong User Id or Password";
echo"<a href=login.html>Next</a>";
}
}
?>
</body>
</html>
