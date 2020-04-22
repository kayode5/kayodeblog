<?php  
include 'dbconfig.php';  
 session_start();  
 if(isset($_SESSION["uname"]))  
 {  
      header("location:index.php");  
 }  
 if(isset($_POST["register"]))  
 {  
      if(empty($_POST["name"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $fname = mysqli_real_escape_string($con, $_POST["fname"]);
           $lname = mysqli_real_escape_string($con, $_POST["lname"]);
           $email = mysqli_real_escape_string($con, $_POST["email"]);  
           $password = mysqli_real_escape_string($con, $_POST["password"]);  
           $password = password_hash($password, PASSWORD_DEFAULT);  
           $query = "INSERT INTO users(name, lname, email, password) VALUES('$fname', '$lname', '$email', '$password')";  
           if(mysqli_query($con, $query))  
           {  
                echo '<script>alert("Registration Done")</script>';  
           }  
      }  
 }  
 
 if(isset($_POST["login"])){

 $_SESSION["lname"] = $_POST["lname"];
 $_SESSION["password"] = $_POST["password"];
 $_SESSION['last_time'] = time();
  
      if(empty($_POST["lname"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $name = mysqli_real_escape_string($con, htmlspecialchars($_POST["lname"]));  
           $password = mysqli_real_escape_string($con, htmlspecialchars($_POST["password"]));  
           $query = "SELECT * FROM users WHERE lname = '$name'";  
           $result = mysqli_query($con, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          //return true;  
                          $_SESSION["lname"] = $name;
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
           <title> Admin-Login | Kayode's Blog </title>  
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
                <!-- <form method="post">  
                     <label>Enter first name</label>  
                     <input type="text" name="fname" class="form-control" />  
                     <br />  
                     <label>Enter last name</label>  
                     <input type="text" name="lname" class="form-control" /> 
<br />
                     <label>Enter Email</label>  
                     <input type="text" name="email" class="form-control" /> 
<br />
                     
                     <label>Enter Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Login" class="btn btn-info" />
                       
                     <p align="right"><a href="register.php">Register Here</a></p>  
                     <br />  
                    
                </form>   -->
                <?php       
                }  
                else  
                {  
                ?>  
                <h3 align="center">Login</h3>  
                <br />  
                <form method="post">  
                     <label>Enter Username</label>  
                     <input type="text" name="lname" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Login" class="btn btn-info" />
                     <!-- <p align="right"><a href="register.php">Register Here</a></p> -->
                
                     <br />  
                    
                </form>  
                <?php  
                }  
                ?>  
           </div>  
      </body>  
 </html>  
