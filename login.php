<?php session_start();
if (isset($_SESSION['name'])) {
    header("location: index.php");
    exit();
}
 include 'includes/header.php';
?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>Great to have you back!</h4>
                            <div class="line"></div>
                        </div>
                        <?php
                        include 'admin/dbconfig.php'; //include database file
                        if(isset($_POST['login'])){ //if login is clicked 
                        if(empty($_POST['name']) || empty($_POST['password'])) // check the email and password is not empty
                        {
                            echo 'Please Provide an email And a Password';
                        }
                        else{
                           
                            $name = mysqli_real_escape_string($con, $_POST["name"]);  
                            $password = mysqli_real_escape_string($con, $_POST["password"]);  
                            $query = "SELECT * FROM user WHERE name = '$name'";  
                            $result = mysqli_query($con, $query);  
                            if(mysqli_num_rows($result) > 0)  
                            {  
                                 while($row = mysqli_fetch_array($result))  
                                 {  
                                      if(password_verify($password, $row["password"]))  
                                      {  
                                           //return true;  
                                           $_SESSION["name"] = $name;  
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
                        else{

                        }
                    
                   
?>
                        <form method="post">
                            
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    
                                </div>
                            </div>
                            <button type="submit" name="login" class="btn vizew-btn w-100 mt-30">Login</button>
                        </form>
                     
                        <div>
                        <a href="register.php"> Or Sign Up Here</a>
                        <a href="forgot-password.php"> <br>Forgot password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Login Area End ##### -->
<?php include 'includes/footer.php' ?>
    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>