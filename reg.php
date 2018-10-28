<html>
<body background="image/bc4.jpg">
<?php
session_start();
mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error());
$id=0; 
$n1=$_REQUEST["hn"];
$n2=$_REQUEST["address"];
$n3=$_REQUEST["state"];
$n4=$_REQUEST["dist"];
$n5=$_REQUEST["tal"];
$n6=$_REQUEST["conh"];
$n7=$_REQUEST["regh"];
$n8=$_REQUEST["facility"];
$n9=$_REQUEST["dn1"];
$n10=$_REQUEST["degree"];
$n11=$_REQUEST["spe"];
$n12=$_REQUEST["regd"];
$n13=$_REQUEST["mn"];
                           //$n14=$_REQUEST["email"];
$n15=$_REQUEST["nightservice"];
                          //$n16=$_REQUEST["pass"];
                          //$n17=$_REQUEST["cpass"];



if($n1==""|| $n2=="" || $n3=="" || $n4=="" || $n5=="" || $n6=="" || $n7=="" || $n8=="" || $n9=="" || $n10=="" || $n11=="" || $n12=="" || $n13=="" || $n15=="")
{
echo"<script>alert('fill all the fields')</script>";
}
else
{
$l1=$_SESSION["EMAIL"];
$l2=$_SESSION["PASS"];
$l3=$_SESSION["CPASS"];
$n18=ucfirst($n5);
$n19=strtoupper($n1);
mysql_query("Insert Into reg Values('$id','$n19','$n2','$n3','$n4','$n18','$n6','$n7','$n8','$n9','$n10','$n11','$n12','$n13','$l1','$n15','$l2','$l3')");
mysql_query("Insert Into loge Values('$l1','$l3')");
echo"<center><h2>REGISTRATION CONFIRMED</h2></center><br>";
echo'<center><h2><font color="blue">'.$n19.'</font></h2></center><br>';
echo"<center><h1>Now You Can&nbsp;<a href='logindoctor.html'>Login</a></h1></center>";
}
?>
</body>
</html>

