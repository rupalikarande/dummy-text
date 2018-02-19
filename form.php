<html>
    <head>
     <title>dummy text demo</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="main.css">
    </head>
    <body>
    <!-- database connection -->
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dummy";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//  if(isset($_POST['add']))
// {
// add data
$name_a="";
$phone="";
$Add="";
$city="";
$email="";

  $name_a=$_POST['name'];
  $phone=$_POST['Phone_No'];
  $Add=$_POST['Address'];
  $city=$_POST['City'];
  $email=$_POST['Email'];
 // prepare and bind
  $stmt = $conn->prepare("INSERT INTO textdemo (name,Phone_No,Address,City,Email) VALUES (?, ?,?,?,?)");
  $stmt->bind_param("sssss", $name_a,$phone,$Add,$city,$email);
  // set parameters and execute
   $stmt->execute();
   
   $result = mysqli_query($conn,$stmt);
        if ($result) {
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    }
    else
    {
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }

  $stmt->close();
  
  // }
  
  
mysqli_close($conn);

?>
<!-- validation -->
<?php
// define variables and set to empty values
$nameErr = $emailErr = $phoneErr= "";
$name = $Email = $Phone_No = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["Email"])) {
    $emailErr = "Email is required";
  } else {
   $Email = test_input($_POST["Email"]);
    // check if e-mail address is well-formed
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

   if(empty($_POST["Phone_No"])){
    $cleared = preg_replace('/^[0-9]/', '', $value);
    if (count($cleared)<10 || count($cleared)>14) {
      echo 'Please enter a valid phone number';
  }else{
      echo "valid";
  }
    }
   
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  ?>    
  <h2 style="text-align:center;color:blue;font-family:Times New Roman, Times, serif;"><b>Customer Visit Form</b></h2>   
        <div   style="margin-left:50px; margin-top:20px; padding:50px; border: 1px solid black; margin-right:50px;"> 
        <p><span class="error">* required field.</span></p>
        <!-- <div class="container" > -->
                 <div class="row">
              <div class="col-sm-8">
                <form action="" method="post">
                   <b><input type="text" id="name" name="name" placeholder=" Name: ">
                   <span class="error">* <?php echo $nameErr;?></span><br><br>
                   <input type="text" id="Phone_No" name="Phone_No" placeholder=" Phone No: ">
                   <span class="error">* <?php echo $phoneErr;?></span><br><br>
                   <input type="text" id="Address" name="Address" placeholder=" Address: "><br><br>
                   <input type="text" id="City" name="City" placeholder=" City: "><br><br>
                    <input type="text" id="Email" name="Email" placeholder=" Email: ">
                    <span class="error">* <?php echo $emailErr;?></span><br><br>
                   <i > <input type="submit" value="add"></i>
                    <!-- <i><input type="submit" value="Cancel"></i> -->
                  <i> <input type="reset" value="Cancel"><i>
                    <i><input type="submit" value="Message"></i>
             </div>
             <div class="col-sm-4">
                                    
                   <input type="submit" value="View Database"><br><br>
                   <input type="submit" value="Send Bulk-Message"><br><br>
                   <input type="submit" value="Display Profile"><br><br>
                </form>
              </div>
            </div>
          </div>
        <!-- </div> -->
        <?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $Email;
echo "<br>";
echo $Phone_No;
echo "<br>";

?>
    </body>
</html>