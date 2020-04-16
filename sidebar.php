<div class="col-12 col-md-5 col-lg-4">
                    <div class="sidebar-area">

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget latest-video-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Latest Post</h4>
                                <div class="line"></div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="single-post-area mb-30">
                                <!-- Post Thumbnail -->
                                <?php
                                                        include ("admin/dbconfig.php");
                                                            $query=mysqli_query($con,"SELECT * FROM blog order by 1 DESC LIMIT 0,1");
                                                            
                                                        while ($row = mysqli_fetch_array($query)){
                                                                $blogId = $row['blogId'];
                                                                $blogName = $row['blogName'];
                                                                $blogBody = $row['blogBody'];
                                                                $image = $row['image'];
                                                                $category = $row['blogCategory'];

                                                                $sql1 = "select * from comment";
                                                                $result1 = mysqli_query($con,$sql1);
                                                                $count1 = mysqli_num_rows($result1);
                                                                
                                                        
                                                        ?>
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
                                                        <?php }?>
                            <!-- Single Blog Post -->
                            

                            <!-- Single Blog Post -->
                           

                            <!-- Single Blog Post -->
                            
                        </div>

                        <!-- ***** Single Widget ***** -->
                        

                        <!-- ***** Sidebar Widget ***** -->
                       


                        <!-- ***** Single Widget ***** -->
                       

                    </div>
                </div>