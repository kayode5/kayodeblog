<?php session_start();
include 'includes/header.php'; ?>
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
                            <h4>Kindly Join Now</h4>
                            <div class="line"></div>
                        </div>
                        <?php
                        include 'admin/dbconfig.php'; 
                        if(isset($_POST['login']))
                        {
                            $name = stripslashes($_REQUEST['name']); // removes backslashes
		                    $name = mysqli_real_escape_string($con,$name);
                            $email = stripslashes($_REQUEST['email']);
                            $email = mysqli_real_escape_string($con,$email);
                            $password = stripslashes($_REQUEST['password']);
                            $password = password_hash($password, PASSWORD_DEFAULT);
                            $sql = "SELECT * FROM user WHERE name='$name' ";
                            $result = mysqli_query($con,$sql);
                            $sql2 = "SELECT * FROM user WHERE email='$email' ";
                            $result2 = mysqli_query($con,$sql2);
                            //$sql2 = "SELECT * FROM user WHERE email=$email";
                            //$result2 = mysqli_query($con,$sql2);
                            //$check=mysqli_num_rows($result);
                           // $check2=mysqli_num_rows($result2);
                            if( mysqli_num_rows($result)){
                                echo '<script> alert("Name Already Exist")</script>';
                            }
                            else if (mysqli_num_rows($result2)){
                                echo '<script> alert("Email Already Exist")</script>';

                            }
                            else{
                                   $query=mysqli_query($con,"INSERT INTO `user`(Id, name, email, password) VALUES (NULL, '$name','$email', '$password')");
                            
                                $result = mysqli_query($con, $query);
                                    if($result){
                                        header("Location: login.php");
                                    }

                               
                            }
                         
                               
                            }
                        ?>
                        <form method="post">
                            <div class="form-group">
                                <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" minlength="8" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    
                                </div>
                            </div>
                            <button type="submit" name="login" class="btn vizew-btn w-100 mt-30"> Sign Up</button>
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
