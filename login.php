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
$q=mysql_query("select * from loge");
$n=0;
while($row=mysql_fetch_array($q))
{
if($row["name"]==$id && $row["password"]==$pass)
{
$n=1;
}
}
if($n==1)
{
echo"<center><h2>Hello</h2>".$id ."<h1><br><h1>...AUTHORIZED USER...</h1></center>";
echo"<a href=changepass.html>Change Password</a><br>";
echo"<a href=update.html>UPDATE INFORMATION</a>";
$q=mysql_query("select * from reg");
$n=0;
while($row=mysql_fetch_array($q))
{
if($row["emailid"]==$id && $row["password"]==$pass)
{
$n=1;
echo"<font color=red size=5>";
echo"<center>....HOSPITAL DETAILS....</center>";
echo"<table border=8  align=center width=90% hight=200%>";
echo "<tr ><td ><b>Hospital Name:-</b></td><td><b>";
echo $row['h_name'] ."</b></td></tr>";
echo "<tr ><td ><b>Hospital Address :-</b></td><td><b>";
echo $row["address"]."</b></td></tr>";
echo "<tr ><td ><b>Contact Number of Hospital :-</b></td><td><b>";
echo $row["contactno"]."</b></td></tr>";
echo "<tr ><td ><b>OPD Timing :-</b></td><td><b>";
echo $row["register_no"]."</b></td></tr>";
echo "<tr ><td><b>Available Facilities In The Hospital :-</b></td><td><b>";
echo $row["facility"]."</b></td></tr>";
echo "<tr ><td><b>Doctor Name :-</b></td><td><b>";
echo $row["docname"]."<b></td></tr>";
echo "<tr ><td><b>Qualification Of Doctor :-</b></td><td><b>";
echo $row["degree"]."</b></td></tr>";
echo "<tr><td><b>Doctor Specialisation :-</b></td><td><b>";
echo $row["specialization"]."</b></td></tr>";
echo "<tr ><td><b>Mobile Number Of Doctor :-</b></td><td><b>";
echo $row["mob_no"]."</b></td><tr>";
echo "<tr ><td ><b>Email Address Of Doctor :-</b></td><td><b>";
echo $row["emailid"]."</b></td></tr>";
echo "<tr ><td ><b>Night Service Provider?:-</b></td><td><font size=4 color=red>";
echo $row["nightser"]."</font></td></tr>";
echo"</table>";
echo"<HR>";
}
}
}
else
{
echo"<script>alert('USER NAME or PASSWORD NOT VALID')</script>";
echo"<br><br><br><br><br>";
echo"<center><h2><a href=login.html>Re-Enter User name and Password</a></h2></center>";
}
}
?>
</body>
</html>