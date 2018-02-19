<!doctype html>
<html>
    <head>
        <title>hotels login </title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?famiy=Open+Sans+Condensed:300" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel="stylsheet" type="text/css">
    </head>
    <body>
            <?php
            session_start();
            $con=mysqli_connect("localhost","root","","dummy");
            if(isset($_POST['login']))
               {
               if($con)
               {
            $user_name=$_POST['username'];
            $pwd=$_POST['password'];
            $query="SELECT * FROM session WHERE username='".$user_name."' and password='".$pwd."' ";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result)>0)
               {
            while($row=mysqli_fetch_assoc($result))
               {
            session_start();
            $_SESSION['user_name']=$row['username'];
            $_SESSION['user_role']=$row['role'];
            header('location:form.php');
               }
               }
            else
              {
            echo "<script>alert('invalid login')</script>";
              }
            }
            }
            ?>
    
            <div id="logo">
                    <img src="Hotelscom.png" width:"118px"; height:"38px" >
                </div>
            
                <div class="base">
                 
            
             <div id="form1">
                 <div id="form-img">
                  <img src="profile.png" width="99" height="99">
                 </div>
                   <div id="mailbox">
                        <form  action="form.php" method="post">

                       <input placeholder="Enter your id" type="text" name="name" style="width:270px; height:42px; border: solid 1px #c4c2c6; font-size:16px; padding-left:8px;"><br><br>   
                       <input placeholder="Enter your password" type="password" name="name" style="width:270px; height:42px; border: solid 1px #c4c2c6; font-size:16px; padding-left:8px;"> <br><br>
                       <input type="submit" id="button2" value="Submit">
                       </form>
                    </div>
                </div>
             <div id="innfo4">
                 <a href="#"/>Register Here</a>
             </div><br>
            
             <div>
                 <img src="hotellogo.png" id="logo2"/>
                 
             </div>
            
            </div>       
    
    </body>
</html>
