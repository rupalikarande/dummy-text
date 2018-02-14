<?php

if(isset($_POST['add']))
{
$name_a="";
$Phone_No="";
$Address="";
$City="";
$Email="";

  $name_a=$_POST['name'];
  $Phone_No=$_POST['Phone_No'];
  $Address=$_POST['Address'];
  $City=$_POST['City'];
  $E_mail=$_POST['Email'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dummy";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO textdemo (Name,Phone_No,Address,City,Email) VALUES (?, ?,?,?,?)");
  $stmt->bind_param("sssss", $name_a, $Phone_No,$Address,$City,$Email);
  
  // set parameters and execute
  
  $stmt->execute();
  
  
  
  echo "data Added successfully";
 
  $stmt->close();
  $conn->close();
}
if(isset($_POST['Cancel']))
{
header('location:cancel.php');
}
if(isset($_POST['Message']))
{
header('location:Message.php');
}
  ?>
  

        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>response</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
            <script src="main.js"></script>
        </head>
        <body>
         succefully added
    

        </body>
        </html>