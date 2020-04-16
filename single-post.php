<?php session_start(); include 'admin/dbconfig.php'; ?>
<?php include 'includes/header.php'; ?>
<?php                                           
$getid=$_GET['id'];
$query=mysqli_query($con,"SELECT * FROM blog WHERE blogId = '$getid' ");
while ($row = mysqli_fetch_array($query)){                                                               
$blogName = $row['blogName'];
$blogBody = $row['blogBody'];
$image = $row['image'];
$category = $row['blogCategory'];


$sql1 = "select * from comment where blogId='$getid' ";
$result1 = mysqli_query($con,$sql1);
$count1 = mysqli_num_rows($result1);

   


?>
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a>Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $blogName ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Pager Area Start ##### -->
    
    <!-- ##### Pager Area End ##### -->

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-details-area mb-80">
    
        <div class="container">
        
            <div class="row">
        
                <div class="col-12">
                    <div class="post-details-thumb mb-50">
                         <img src="admin/<?php echo $row['image']; ?>" style="width: 90%; height: 80%" alt="course">
                    </div>
                </div>

                   
            </div>

            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
               
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="post-details-content">
                        <!-- Blog Content -->
                      
                        <div class="blog-content">

                            <!-- Post Content -->
                            <div class="post-content mt-0">
                                <a class="post-cata cata-sm cata-danger"><?php echo $category?></a>
                                <a class="post-title mb-2"><?php echo $blogName ?></a>

                                <div class="d-flex justify-content-between mb-30">
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-author"></a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        
                                    </div>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $count1 ?></a>
                                        
                                    </div>
                                </div>
                            </div>

                            <p><?php echo $blogBody ?></p>

                            <!-- Post Tags -->
                          

                            <!-- Post Author -->
                                 

                            <!-- Related Post Area -->
                            
<?php }?>
                            <!-- Comment Area Start -->
                            <div class="comment_area clearfix mb-50">
                         
                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Comment</h4>
                                    <div class="line"></div>
                                </div>

                                <ul>
                                <?php
                                
                                                        
                                                      
                                                        $query=mysqli_query($con,"SELECT * FROM comment WHERE blogId='$getid'");
                                                        while ($row = mysqli_fetch_array($query)){                                                               
                                                        $name = $row['name'];
                                                        $email = $row['email'];
                                                        $message = $row['message'];
                                                        $date = $row['date'];
                                                       
                                                        
                                                        
                                                        ?>
                                    <!-- Single Comment Area -->
                                    <li class="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content d-flex">
                                            <!-- Comment Author -->
                                            
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <a href="#" class="comment-date"><?php echo $date ?></a>
                                                <h6><?php echo $name ?></h6>
                                                <p><?php echo $message ?></p>
                                               
                                            </div>
                                        </div>
                                        <?php }?>
                                       
                                    </li>

                                    <!-- Single Comment Area -->
                                    
                                </ul>
                            </div>

                            <!-- Post A Comment Area -->
                            <div class="post-a-comment-area">

                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Leave a reply</h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Reply Form -->
                                <div class="contact-form-area">
                                <?php
                        include 'admin/dbconfig.php'; 
                        if(!empty($_SESSION["name"])){

                            if(isset($_POST['submit']))
                        {
                            $name = mysqli_real_escape_string($con,$_POST['name']);
                            $email = mysqli_real_escape_string($con,$_POST['email']);
                            $message = mysqli_real_escape_string($con,$_POST['message']);
                            $date = date('Y-m-d H:i:s');
                            
                            $query = "INSERT INTO comment (Id, name, email, message, date, blogId) VALUES (NULL, '$name','$email', '$message', '$date', '$getid')";
                            $result = mysqli_query($con, $query);
                            
                         
                        }?>
                        <form method="post">
                                    
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name*">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email*">
                                        </div>
                                        <div class="col-12">
                                            <textarea name="message" class="form-control" id="message" placeholder="Message*"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn vizew-btn mt-30" name="submit" type="submit">Submit Comment</button>
                                        </div>
                                    </div>
                                </form>
                        
                      
                    <?php }
                    else{         echo 'Please Login To Comment';
        
                                    
                                    } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                         </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->
    <?php include 'includes/footer.php'?> 
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