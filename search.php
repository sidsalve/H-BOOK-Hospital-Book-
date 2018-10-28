<html>
<body background="images/01422_summersky_1920x1200.jpg">
<?php
SESSION_START();
mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error()); 
$tal=$_REQUEST["tal"];
setcookie("tal","$tal");
$spe=$_REQUEST["spe"];
setcookie("spe","$spe");
$ns=$_REQUEST["night"];
setcookie("ns","$ns");
$p=ucwords($tal);
if($p=="" || $spe=="" || $ns=="")
{
echo "<script>alert('Please Fill All The Field')</script>";
echo"<center><h2>FILL ALL THE FIELDS</h2></center>";
}
else
{
$q=mysql_query("select * from reg") or die(mysql_error());
$n=0;
while($row=mysql_fetch_array($q))
{
if( $row["taluka"]==$tal && $row["specialization"]==$spe && $row["nightser"]==$ns)
{
    
    $n=1;
   $id=$row["id"];
    ?>
    <a href="look.php?id=<?php echo $id;?>"><?php echo $row['h_name']?></a><br>
<?php
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
