<html>
<style>
/* Full-width input fields */
input[type=text] {
    width: 15%;
    padding: 10px 18px;
    margin: 8px 10px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
input[country], select {
    width: 15%;
    
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.cancelbtn {
    width: auto;
    padding: 14px 20px;
    background-color: #f44336;
}
button {
    background-color:#4CAF50 ;
    color: white;
    padding: 12px 18px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 10%;
</style>
<body background="image/bc9.jpg">
<form method="POST" action="next.php">
<center><h1>***Records of Registered Hospitals***</h1></center>
<div align="right">

<FONT color=black size=4>Enter Id:</FONT><input type="text" name=id><button type="submit">Submit</button>
</div>
</form>
<form method="POST" action="byspecialization.php">
<div align="right">
<lable for="country">Select Specialist:</lable>
<SELECT name=spe>
<OPTION value=Null selected>select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</OPTION>
<OPTION value=Peadiatric select>Pediatric</OPTION>
<OPTION value=Heart Specialist select>Heart Specialist&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</OPTION>
<OPTION value=Orthopedics select>Orthopaedics</OPTION>
<OPTION value=Gynacologist select>Gynaecologist</OPTION>
<OPTION value=Ayurvedic select>Ayurvedic</OPTION>
<OPTION value=General Physician select>General Physician</OPTION>
<OPTION value=Dentist select>Dentist</OPTION>
<OPTION value=Homeopathic select>Homeopathic</OPTION>
<OPTION value=Other select>Other</OPTION>
</SELECT>
<button type="submit">Submit</button>
</div>
</form>
<table border=1>
<tr><th>Id</th><th>Hospital Name</th></tr>

<?php
mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error());
$count=0;
$q=mysql_query("select * from reg");
while($row=mysql_fetch_array($q))
{
$count++;
echo "<tr ><td>";
echo $row['id'] ."</td>";
echo "<td>";
echo $row['h_name'] ."</td></tr>";
}
echo"<h2><u>There Are&nbsp;".$count."&nbsp;Hospitals Registered</u></h2>";
?>
</table>
<form action="adminlogin.html">
<div align="right">
<button type="submit" class="cancelbtn">Logout</button>
</div>
</form>
</body>
</html>