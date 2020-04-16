<?php session_start();
include 'includes/header.php'; 
?>
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Register</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Registration Area Start ##### -->
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>Reset Password</h4>
                            <div class="line"></div>
                        </div>
                        <?php
                        include 'admin/dbconfig.php'; 
                        if(isset($_POST['login']))
                        {
                             $name = mysqli_real_escape_string($con, $_POST["name"]);
                            $password1 = stripslashes($_REQUEST['password1']);
                            $password1 = password_hash($password1, PASSWORD_DEFAULT);
                             $password2 = stripslashes($_REQUEST['password2']);
                            $password2 = password_hash($password2, PASSWORD_DEFAULT);
                           // $sql = "SELECT * FROM user WHERE name='$name'";
                            //$result = mysqli_query($con,$sql);
                            //$sql2 = "SELECT * FROM user WHERE email=$email";
                            //$result2 = mysqli_query($con,$sql2);
                            //$check=mysqli_num_rows($result);
                           // $check2=mysqli_num_rows($result2);
                           // if( mysqli_num_rows($result)){
                             //   echo '<script> alert("Name Already Exist")</script>';
                           // }
                           // else{
                            if((password_verify($password1, $row["password1"])) == (password_verify($password2, $row["password2"]))){
                                   $query=mysqli_query($con,"UPDATE `users` SET `password`='$password1' WHERE name = '$name'");
                            
                                
                                    if($query){
                                       echo '<script>alert("Password Changed")</script>';
                                    }

                               }
                               else{
                                echo '<script>alert("Password Does not Match")</script>';  
                               }
                           // }
                         
                               
                            }
                        ?>
                        <form method="post">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password1" class="form-control" minlength="8" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password2" class="form-control" minlength="8" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                         
                            <button type="submit" name="login" class="btn vizew-btn w-100 mt-30"> Change Password</button>
                        </form>
                        <div>
                        <a href="login.php"> Or Sign In Here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Registration Area End ##### -->
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