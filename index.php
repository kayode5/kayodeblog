<?php session_start();
 include 'admin/dbconfig.php'; 
 include 'includes/header.php';
?>


<!-- ##### Hero Area Start ##### -->
  
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Trending Posts Area Start ##### -->
    <section class="trending-posts-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h4> </h4>
                        <?php 
                        if(!empty($_SESSION["name"])) { //if user is logged in display a welcome username else leave blank
                            echo" <br><br><br>";
                        } else {
                            echo" <h4>Welcome</h4>";
                        }
                        ?>
                        <div class="line"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog Post -->
                <?php
include ("admin/dbconfig.php");
    $query=mysqli_query($con,"SELECT * FROM blog order by 1 DESC"); //display blogs range 1-3 in descending order
    
while ($row = mysqli_fetch_array($query)){
        $blogId = $row['blogId'];
        $blogName = $row['blogName'];
        $blogBody = $row['blogBody'];
        $image = $row['image'];
        $category = $row['blogCategory'];


   
?>

                <div class="col-12 col-md-4">
                    <div class="single-post-area mb-80">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                        <img src="admin/<?php echo $row['image']; ?>" style="width: 100%; height: 200px" alt="course">
                        
                            <!-- Video Duration -->
                          
                        </div>

                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="#" class="post-cata cata-sm cata-success"><?php echo $category?></a>
                            <a href="single-post.php?id=<?php echo $blogId ?>" class="post-title"><?php echo $blogName?></a>
                            <div class="post-meta d-flex">
                        
                               
                            </div>
                        </div>
                    </div>
                </div>
                <?php  } ?> 
                <!-- Single Blog Post -->
                
            </div>

        </div>
    </section>
    <!-- ##### Trending Posts Area End ##### -->

    <!-- ##### Vizew Post Area Start ##### -->
    <section class="vizew-post-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="all-posts-area">
                        <!-- Section Heading -->
                       

                        <!-- Featured Post Slides -->
                        

                        

                       

                    </div>
                </div>

               <?php include 'sidebar.php'?>
            </div>
        </div>
    </section>
    <!-- ##### Vizew Psot Area End ##### -->
<?php include 'includes/footer.php'; ?>
