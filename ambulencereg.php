<html>
<body background="01422_summersky_1920x1200.jpg">
<?php
mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error()); 
$n1=$_REQUEST["tal"];
$n2=$_REQUEST["amb"];
$n3=$_REQUEST["nme"];
$n4=$_REQUEST["namb"];
$n5=$_REQUEST["onme"];
$n6=$_REQUEST["mob"];
if($n1==""|| $n2=="" || $n4=="" || $n5=="" || $n6=="")
{
echo"<script>alert('fill all the fields')</script>";
echo"<center><a href=ambulencereg.html><h1>PLEASE FILL ALL FIELDS</h1></a></center>";
}
else
{
$q=mysql_query("select * from ambulence");
while($row=mysql_fetch_array($q))
{
if($row['onumber']=$n6)
{
echo "<script>alert('This Number Is already Registered ')</script>";
header("ambulencereg.html");
}
else
{
mysql_query("insert into ambulence values('$n1','$n2','$n3','$n4','$n5','$n6')");
echo"<center><font size=5>";
echo"<h1><font color=red>REGISTRATION CONFIRMED</font></h1><br><br>";
echo"<h3><font color=red>***Your Ambulence Information***</font></h3><br>";
echo"<table>";
echo"<tr><td>Your Ambulence Type:</td></tr>";
echo"<b>$n2</b>";
echo"Ambulence Is Attach To Hospital:";
echo"<b>$n3</b><br>";
echo"Contact Number Of Ambulence:";
echo"<b>$n4</b><br>";
echo"Owner Of Ambulence:";
echo"<b>$n5</b><br>";
echo"Mobile Number Of Owner :";
echo"<b>$n6</b><br>";
echo"</font></center>";
echo"<br><br><br>";
echo"<h3><a href=home.html>HOME</a></h3>";
echo"<h3><a href=home.html>BACK</a></h3>";
}
}
}
?>
</body>
</html>
