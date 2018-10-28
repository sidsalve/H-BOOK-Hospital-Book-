<html>
    <body background="image/bc3.jpg">
        <table border="1">
            <tr><th>Id</th><th>Taluka</th><th>Type</th><th>Attach Hosp. Name</th><th>Ambulence Contact No.</th><th>Owner Name</th><th>Owner EmailId</th><th>Owner Mobile No.</th></tr>
        <?php
        mysql_connect("localhost","root","sid") or die(mysql_error());
mysql_select_db("sid") or die(mysql_error()); 
$amb=$_REQUEST["amb"];
        if($amb=="")
{
echo "<script>alert('Please Fill All The Field')</script>";
echo"<center><h2>FILL ALL THE FIELDS</h2></center>";
}
else
{
$q=mysql_query("select * from ambulence") or die(mysql_error());
$n=0;
while($row=mysql_fetch_array($q))
{
if( $row["type"]==$amb)
{
$n=1;


echo "<tr ><td >";
echo $row['Id'] ."</td>";
echo "<td >";
echo $row['taluka'] ."</td>";
echo "<td >";
echo $row["type"]."</td>";
echo "<td >";
echo $row["attachhosp"]."</td>";
echo "<td >";
echo $row["contact"]."</td>";
echo "<td>";
echo $row["oname"]."</td>";
echo "<td>";
echo $row["email"]."</td>";
echo "<td>";
echo $row["onumber"]."</td></tr>";
}
}
if(!$n==1)
{
echo"<center><h1>NO RECORD FOUND PLEASE TRY ANOTHER</h1></center>";
}
}
?>
        </table>
</body>
</html>

    