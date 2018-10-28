<html>
<body background="images/01422_summersky_1920x1200.jpg">
<?php
SESSION_START();
mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error());
$id=$_REQUEST["uname"];
setcookie("unme","$id");
$pass=$_REQUEST["pass"];
setcookie("psw","$pass");
if($id=="" || $pass=="")
{
echo "<script>alert('Please Fill All The Field')</script>";
echo"<h1><center>PLEASE FILL ALL THE FIELDS</CENTER></H1>";
}
else
{
$q=mysql_query("select * from admin");
$n=0;
while($row=mysql_fetch_array($q))
{
if($row["uname"]==$id && $row["password"]==$pass)
{
$n=1;
}
}
if($n==1)
{
echo"<script>alert('Admin Login Successful!')</script>";

echo"<center><h1>Welcome</h1>".$id ."<h1><br><h1>...AUTHORIZED USER...</h1></center>";
?>
<center><h2>
<a href="doctorsdetails.php">Registered Hospitals</a><br>

<a href="ambulencedetails.php">Registered Ambulence</a>
</h2></center>
<?php
}
else
{
echo"<script>alert('USER NAME or PASSWORD NOT VALID')</script>";
echo"<br><br><br>";
echo"<center><h2><a href=adminlogin.html>Re-Enter User name and Password</a></h2></center>";
}
}
?>
</body>
</html>