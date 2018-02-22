 
  <?php 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "dummy";
 
 // Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 echo"connected";
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
 

  
 $sql = "SELECT Name,Phone_No,Address,City,Email FROM textdemo";
 $result1 = mysqli_query($conn, $sql);
  
  if ($result1->num_rows > 0) {
      echo "<table><tr><th>Name</th><th>phoneno</th><th>address</th><th>city</th><th>email</th></tr>";
     
      // output data of each row
      while($row = $result1->fetch_assoc()) {
          echo "<tr><td>".$row["Name"]."</td><td>" .$row["Phone_No"]."</td><td>" .$row["Address"]."</td><td>".$row["City"]."</td><td>".$row["Email"]."</td></tr>";
      }
      echo "</table>";
  } else {
      echo "0 results";
  }
   
  
  mysqli_close($conn);
   
?>
