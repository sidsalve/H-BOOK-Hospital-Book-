<html>
<body background="images/01422_summersky_1920x1200.jpg">
<?php
SESSION_START();
mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error()); 
$tal=$_REQUEST["tal"];
setcookie("tal","$tal");
$amb=$_REQUEST["amb"];
setcookie("amb","$amb");
$p=ucwords($tal);
if($tal=="" || $amb=="" )
{
echo "<script>alert('Please Fill All The Field')</script>";
echo"<center><a href=ambulencereg.html><h1>PLEASE FILL ALL FIELDS</h1></a></center>";
}
else
{
$q=mysql_query("select * from ambulence") or die(mysql_error());
$n=0;
echo"<h3><a href=home.html>GO TO HOME</a></h3>";
echo"<h3><a href=ambulencesearch.html>BACK</a></h3>";
while($row=mysql_fetch_array($q))
{
if( $row["taluka"]==$tal && $row["type"]==$amb)
{
$n=1;
echo"<font size=5 color=red><center>Search Result</center></font>";
echo"<HR>";
echo"<table align=center border=0>";
echo"<tr><td><b>Contact Number Of Ambulence:</b></td><td><b>";
echo $row["contact"]."</b></td></tr>";
echo"<tr><td><b>Ambulence Owner Name :</b></td><td><b>";
echo $row["oname"]."</b></td></tr>";
echo"<tr><td><b>Ambulence Owners Mobile Number:</b></td><td><b>";
echo $row["onumber"]."</b></td></tr>";
echo"<tr><td><b>The Ambulence Type:</b></td><td><b>";
echo $row["type"]."</b></td></tr>";
echo"<tr><td><b>Attach Hospital Name:</b></td><td><b>";
echo $row["attachhosp"]."</b></td></tr>";
echo"</table>";
echo"<HR>";
}
}
if(!$n==1)
{
echo"<center><h1>NO RECORD FOUND PLEASE TRY ANOTHER</h1></center>";
}
}
?>
</body>
</html>
