
 <?php 
$con= mysqli_connect("localhost","root","","dummy");
$query= "SELECT * FROM textdemo";
$result= mysqli_query ($con, $query);
if(mysqli_num_rows($result)>0)
{
echo "<table border='2' style='padding:25px; margin: auto; text-align: center; color:white;'>
<tr>
<th>Name</th>
<th>Phone_No</th>
<th>Address</th>
<th>City</th>
<th>Email</th></tr>";
while($row=mysqli_fetch_assoc($result))
{
//var_dump ($row);
echo "<tr>";
echo "<td>".$row['Name']."</td>";
echo "<td>".$row['Phone_No']."</td>";
echo "<td>".$row['Address']."</td>";
echo "<td>".$row['City']."</td>";
echo "<td>".$row['Email']."</td>";
echo "</tr>";
}
echo "</table>";
}
else
{
echo "<p style='color:white; text-align:center;'>records not found</p>";
}
?>
 