<html>
<body background="image/bc4.jpg">
<?php
session_start();
mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error());
$id=0; 
$n1=$_REQUEST["tal"];
$n2=$_REQUEST["amb"];
$n3=$_REQUEST["nme"];
$n4=$_REQUEST["namb"];
$n5=$_REQUEST["onme"];
$n6=$_REQUEST["mob"];

                           //$n14=$_REQUEST["email"];

                          //$n16=$_REQUEST["pass"];
                          //$n17=$_REQUEST["cpass"];



if($n1==""|| $n2=="" || $n3=="" || $n4=="" || $n5=="" || $n6=="")
{
echo"<script>alert('fill all the fields')</script>";
}
else
{
$l1=$_SESSION["EMAIL"];
$l2=$_SESSION["PASS"];
$l3=$_SESSION["CPASS"];
mysql_query("Insert Into ambulence Values('$id','$n1','$n2','$n3','$n4','$n5','$l1','$n6','$l2','$l3')");
mysql_query("Insert Into ambsignup Values('$l1','$l3')");
echo"<center><h2>REGISTRATION CONFIRMED</h2></center><br>";
echo'<center><h2><font color="blue">'.$l1.'</font></h2></center><br>';
echo"<center><h1>Now You Can&nbsp;<a href='loginambulence.html'>Login</a></h1></center>";
}
?>
</body>
</html>

