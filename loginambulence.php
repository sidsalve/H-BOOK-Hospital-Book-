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
$q=mysql_query("select * from ambsignup");
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
echo"<center><h2>Hello</h2>".$id ."<h1><br><h1>...AUTHORIZED USER...</h1></center>";
echo"<a href=changepass.html>Change Password</a><br>";
echo"<a href=update.html>UPDATE INFORMATION</a>";
$q=mysql_query("select * from ambulence");
$n=0;
while($row=mysql_fetch_array($q))
{
if($row["email"]==$id && $row["cpass"]==$pass)
{
$n=1;
echo"<font color=red size=5>";
echo"<center>....DETAILS....</center>";
echo"<table border=8  align=center width=90% hight=200%>";
echo "<tr ><td ><b>Adreess:-</b></td><td><b>";
echo $row['taluka'] ."</b></td></tr>";
echo "<tr ><td ><b>Type of Ambulence :-</b></td><td><b>";
echo $row["type"]."</b></td></tr>";
echo "<tr ><td ><b>Attach Hospital Name :-</b></td><td><b>";
echo $row["attachhosp"]."</b></td></tr>";
echo "<tr ><td ><b>Ambulence Contact No.:-</b></td><td><b>";
echo $row["contact"]."</b></td></tr>";
echo "<tr ><td><b>Woner Name :-</b></td><td><b>";
echo $row["oname"]."</b></td></tr>";
echo "<tr ><td><b>Phone No.:-</b></td><td><b>";
echo $row["onumber"]."<b></td></tr>";
echo"</table>";
echo"<HR>";
}
}
}
else
{
echo"<script>alert('USER NAME or PASSWORD NOT VALID')</script>";
echo"<br><br><br><br><br>";
echo"<center><h2><a href=loginambulence.html>Re-Enter User name and Password</a></h2></center>";
}
}
?>
</body>
</html>