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
            
        <div   style="margin-left:50px; margin-top:20px; padding:50px; border: 1px solid black; margin-right:50px;"> 
        <h2 style="text-align:center;color:blue;font-family:Times New Roman, Times, serif;"><b>Login Form</b></h2>
        <div class="container" >
                 <div class="row">
              <div class="col-sm-8">
                <form action="server.php" method="post">
                   <input type="text" id="name" name="name" placeholder=" Name: "><br><br>
                   <input type="text" id="Phone_No" name="Phone_No" placeholder=" Phone No: "><br><br>
                   <input type="text" id="Address" name="Address" placeholder=" Address: "><br><br>
                   <input type="text" id="City" name="City" placeholder=" City: "><br><br>
                    <input type="text" id="Email" name="Email" placeholder=" Email: "><br><br>
                   <i > <input type="submit" value="add"></i>
                    <i><input type="submit" value="Cancel"></i>
                    <i><input type="submit" value="Message"></i>
             </div>
             <div class="col-sm-4">
                   <div>                   
                   <input type="submit" value="View Database"><br><br>
                   <input type="submit" value="Send Bulk-Message"><br><br>
                   <input type="submit" value="Display Profile"><br><br>
                </form>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>