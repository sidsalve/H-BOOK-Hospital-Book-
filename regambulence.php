<html>
<head>
<script>
function myFunction(x) {
    x.style.background = "sky blue";
}
</script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {margin:0;}

.icon-bar {
    width: 100%;
    text-align: center;
    background-color: #555;
    overflow: auto;
    position:fixed;
}

.icon-bar a {
    width: 20%;
    padding: 12px 0;
    float: left;
    margin:bottom;
    transition: all 0.3s ease;
    color: white;
    font-size: 36px;
    
}

.icon-bar a:hover {
    background-color: #000;
}

.active {
    background-color: #4CAF50 !important;
}
</style>

<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position:absolute;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>




</head>
<body background="image/bc4.jpg"> 

<div class="icon-bar">
  <a class="active" href="home.html"><i class="fa fa-home">HOME</i></a> 
  <a href="select signup.html">SIGNUP</a> 
  <a href="select login.html">LOGIN</a> 
  <a href="select search.html">SEARCH</a>
  <a href="about.html">ABOUT</a> 
</div>
</div>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>



<?php
mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error());
session_start();
$_SESSION["EMAIL"]=$_REQUEST["email"];
$_SESSION["PASS"]=$_REQUEST["pass"];
$_SESSION["CPASS"]=$_REQUEST["cpass"];

if($_SESSION["EMAIL"]=="" || $_SESSION["PASS"]=="" || $_SESSION["CPASS"]=="")
{
echo"<script>alert('fill all the fields')</script>";

}
else
{
$check=explode('@',$_SESSION["EMAIL"]);
if(count($check)!=2 )
{
echo"<script>alert('WRONG EMAILID')</script>";
echo"<a href=reg.html>REGISTER Once Again</a>";
}
else
{
$c=0;
$q=mysql_query("select * from ambsignup");
while($row=mysql_fetch_array($q))
{
 if($row['uname']==$_SESSION["EMAIL"])
{
$c=1;
}
}
if($c==1)
{
echo"<script>alert('ID allready exist')</script>";
echo"This Id Is Is Already Used Please Choose Another";
}
else
{
if(!$c==1)
{
?>
<form method=POST action="regambulence1.php">

 <br><br>
<HR>
<center><font color=red size=6 >&nbsp;&nbsp;&nbsp;Registration form</font></center>
<fieldset><table align=center width=40% hight=100% border=0>

<tr><td><FONT color=black size=4>Enter Taluka:</FONT></td><td>
<INPUT TYPE="TEXT" name=tal></td></tr><br><br>

<tr><td><FONT color=black size=4>Select Ambulence Type</FONT></td><td>
<SELECT name=amb>
<OPTION value=null selected>select</OPTION>
<OPTION value=Private select>Private</OPTION>
<OPTION value=Hospital Attach select>Hospital Attach </OPTION>
<OPTION value=Government select>Government</OPTION>
</SELECT></td></tr>
<tr><td><FONT color=black size=4>Attach Hospital Name</FONT></td><td>
<INPUT TYPE="TEXT" name=nme></td></tr>
<tr><td><FONT color=black size=4>Contact Numbers Of Ambulence:</FONT></td><td>
<INPUT TYPE="TEXT" name=namb></td></tr>
<tr><td><FONT color=black size=4>Enter Owner Name</FONT></td><td>
<INPUT TYPE="TEXT" name=onme></td></tr>
<tr><td><FONT color=black size=4>Enter Owner Mobile Number</FONT></td><td>
<INPUT TYPE="TEXT" name=mob></td></tr>


<tr><td><INPUT TYPE="reset" value="Reset"></td><td>
<INPUT TYPE="submit" value="Submit"></td></tr>
<tr><td><a href=home.html><font color=blue>BACK</font></a>
</td></tr>                     
</fieldset>
</table>
</form>

<?php
}
}
}
}
?>
</body>
</html>
