<html>
    <body background="image/bc3.jpg">
        <table border="1">
            <tr><th>Id</th><th>Hospital Name</th><th>Address</th><th>Contact No</th><th>OPD Time</th><th>Facility</th><th>Doctor Name</th><th>Qualification</th><th>Specialization</th><th>Mobile No.</th><th>EmailId</th><th>Night Service</th></tr>
        <?php
        mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error()); 
$id=$_REQUEST["id"];

        if($id=="")
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
if( $row["id"]==$id)
{

$n=1;
echo"<center>....HOSPITAL DETAILS....</center>";
echo "<tr ><td >";
echo $row['id'] ."</td>";
echo "<td >";
echo $row['h_name'] ."</td>";
echo "<td >";
echo $row["address"]."</td>";
echo "<td >";
echo $row["contactno"]."</td>";
echo "<td >";
echo $row["register_no"]."</td>";
echo "<td>";
echo $row["facility"]."</td>";
echo "<td>";
echo $row["docname"]."</td>";
echo "<td>";
echo $row["degree"]."</td>";
echo "<td>";
echo $row["specialization"]."</td>";
echo "<td>";
echo $row["mob_no"]."</td>";
echo "<td >";
echo $row["emailid"]."</td>";
echo "<td ><font size=4 color=red>";
echo $row["nightser"]."</font></td></tr>";
$hosp=$row['h_name'];
}
}
echo"<h2>Information of&nbsp;<font color=red>"."$hosp"."</font>&nbsp;Hospital</h2>";
if(!$n==1)
{
echo"<center><h1>NO RECORD FOUND PLEASE TRY ANOTHER</h1></center>";
}
}
?>
        </table>
</body>
</html>

    