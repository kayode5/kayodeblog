<?php  
include '../admin/dbconfig.php';  
 session_start();  
 if(isset($_SESSION["email"]) || isset($_SESSION["Id"]))  
 {  
      header("location:index.php");  
 }  
 
 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["email"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
                    
          $email = mysqli_real_escape_string($con, $_POST["email"]);  
           $password = mysqli_real_escape_string($con, $_POST["password"]);  
           $query = "SELECT * FROM author WHERE email = '$email'";  
           $result = mysqli_query($con, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          //return true;  
                          $_SESSION["email"] = $email; 
                          $_SESSION["Id"] = $row["Id"]; 
                          header("location:index.php");  
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Wrong User Details")</script>';  
                     }  
                }  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title> Author-Login | Kayode's Blog </title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                
                <br />  
                <?php  
                if(isset($_GET["action"]) == "login")  
                {  
                ?>  
                <h3 align="center">Login</h3>  
                <br />  
            
                <?php       
                }  
              
                ?>  
              <h3 align="center">Login</h3>  
                <br />  
                <form method="post">  
                <label>Enter Email</label>  
                     <input type="email" name="email" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Login" class="btn btn-info" />  
                     <br />
                
                     <br />  
                    
                </form>    
           </div>  
      </body>  
 </html>  