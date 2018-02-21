<html>
    <head>
     <title>dummy text demo</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="main.css">
     <style>
      /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
    </style>
    <!--searching script-->
     <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>   
    </head>
    <body>
    <!-- database connection -->
    <?php
    if (isset($_POST['add'])) 
    {
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
//  if(isset($_POST['add']))

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
  $result = mysqli_query($conn,$stmt);
        if ($result) {
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    }
    else
    {
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }
  // set parameters and execute
   $stmt->execute();
   
   

  $stmt->close();
  
  mysqli_close($conn);
  }
?>
<!-- validation -->
<?php
// define variables and set to empty values
$nameErr = $emailErr = $phoneErr= "";
$name = $Email = $Phone_No = "";
$value = "";
  $cleared="";

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
      $phoneErr="phone-No: is required";
     }
   else{
    $Phone_No = test_input($_POST["Phone_No"]);
    // check if number is in well-formed
    $cleared = preg_replace('/^[0-9]/', '', $value);
    if (count($cleared)<10 || count($cleared)>14) {
     $phoneErr="Please enter a valid phoneno";
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
  <!--search by number-->
  <!--backend search-->
  <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "dummy");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST['term'])){
    // Prepare a select statement
    $sql = "SELECT * FROM textdemo WHERE Phone_No LIKE ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST['term'] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>" . $row["Phone_No"] . "</p>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($link);
?>
 <h2 style="text-align:center;color:blue;font-family:Times New Roman, Times, serif;"><b>Customer Visit Form</b></h2>   
        <div   style="margin-left:50px; margin-top:20px; padding:50px; border: 1px solid black; margin-right:50px;"> 
        <p><span class="error">* required field.</span></p>
        <!-- <div class="container" > -->
                 <div class="row">
              <div class="col-sm-8">
                <form action="" method="post">
                   <b><input type="text" id="name" name="name"  placeholder=" Name: ">
                   <span class="error">* <?php echo $nameErr;?></span><br><br>
                   <input type="text" class="search-box" id="Phone_No" name="Phone_No" placeholder=" Phone No: ">
                   <div class="result"></div>
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
        
    </body>
</html>
