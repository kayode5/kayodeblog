<?php session_start();
include 'includes/header.php';
include 'admin/dbconfig.php'; ?>
<!-- ##### Hero Area Start ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Archive Grid Posts Area Start ##### -->
    <div class="vizew-grid-posts-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Archive Catagory & View Options -->
                    <div class="archive-catagory-view mb-50 d-flex align-items-center justify-content-between">
                        <!-- Catagory -->
                        <div class="archive-catagory">
                            <h4><i class="fa fa-trophy" aria-hidden="true"></i> All Posts</h4>
                        </div>
                         
                        <div class="view-options">
                       
                            </div>
                    </div>

                    <div class="row">
                        <!-- Single Blog Post -->
                        
                        <?php
                        $search = stripslashes($_REQUEST['q']);
                        $search = mysqli_real_escape_string($con,$search);
                        
    $query=mysqli_query($con,"SELECT * FROM blog WHERE blogCategory LIKE ('%$search%') OR blogBody LIKE ('%$search%')  OR blogName LIKE ('%$search%')  "); //select all from table blog
    
while ($row = mysqli_fetch_array($query)){ //loop through the table rows
    $blogId=$row['blogId'];
  ?>
                        <div class="col-12 col-md-6">
                            <div class="single-post-area mb-50">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                <img src="admin/<?php echo $row['image']; //display the image that was moved ?>" style="width: 100%; height: 200px" alt="course">
                                    <!-- Video Duration -->
                               
                                </div>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata cata-sm cata-success"><?php echo $category // echo category?></a>
                                    <a href="single-post.php?id=<?php echo $blogId ?>" class="post-title"><?php echo $blogName?></a>
                                   
                                </div>
                            </div>
                        </div>
<?php }?>
                    
                       
                    </div>

                    <!-- Pagination -->
                  
                </div>
                <?php include 'sidebar.php'?>
            </div>
        </div>
    </div>
    <!-- ##### Archive Grid Posts Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include 'includes/footer.php'?>
    <!-- ##### Footer Area End ##### -->

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