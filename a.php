<html>
<body background="01422_summersky_1920x1200.jpg">
<?php
SESSION_START();
mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error()); 
$q=mysql_query("select * from reg") or die(mysql_error());
while($row=mysql_fetch_array($q))
{
if( $row["h_name"]==$_COOKIE["s"]&& $row["taluka"]==$_COOKIE["tal"] && $row["specialization"]==$_COOKIE["spe"] && $row["nightser"]==$_COOKIE["ns"])
{
echo"<font color=red size=5>";
echo"<center>....HOSPITAL DETAILS....</center>";
echo"<table border=8 align=center width=90% hight=100%>";
echo "<tr><td><b>Hospital Name:-</b></td><td><b>";
echo $row['h_name'] ."</b></td></tr>";
echo "<tr><td><b>Hospital Address :-</b></td><td><b>";
echo $row["address"]."</b></td></tr>";
echo "<tr><td><b>Contact Number of Hospital :-</b></td><td><b>";
echo $row["contactno"]."</b></td></tr>";
echo "<tr><td><b>OPD Timing :-</b></td><td><b>";
echo $row["register_no"]."</b></td></tr>";
echo "<tr><td><b>Available Facilities In The Hospital :-</b></td><td><b>";
echo $row["facility"]."</b></td></tr>";
echo "<tr><td><b>Doctor Name :-</b></td><td><b>";
echo $row["docname"]."<b></td></tr>";
echo "<tr><td><b>Qualification Of Doctor :-</b></td><td><b>";
echo $row["degree"]."</b></td></tr>";
echo "<tr><td><b>Doctor Specialisation :-</b></td><td><b>";
echo $row["specialization"]."</b></td></tr>";
echo "<tr><td><b>Mobile Number Of Doctor :-</b></td><td><b>";
echo $row["mob_no"]."</b></td><tr>";
echo "<tr><td><b>Email Address Of Doctor :-</b></td><td><b>";
echo $row["emailid"]."</b></td></tr>";
echo "<tr><td><b>Night Service Provider?:-</b></td><td><font size=4 color=red>";
echo $row["nightser"]."</font></td></tr>";
echo"</table>";
echo"<HR>";
}
}
?>
</body>
</html>
