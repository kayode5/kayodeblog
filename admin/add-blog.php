<?php

//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['uname'])) {
    header("location: login.php");
    exit();
}


$name = $_SESSION['uname'];
?>
<!DOCTYPE html>
<html lang="en">


			<!-- ============================================================== -->
			<!-- 						Topbar Start 							-->
			<!-- ============================================================== -->
			<?php include'header.php'; ?>
		<!-- ============================================================== -->
		<!--                        Topbar End                              -->
		<!-- ============================================================== -->
		
		
		<!-- ============================================================== -->
		<!--                        Right Side Start                        -->
		<!-- ============================================================== -->
		
		<!-- ============================================================== -->
		<!--                        Right Side End                          -->
		<!-- ============================================================== -->
		

        <!-- ============================================================== -->
		<!-- 						Navigation Start 						-->
		<!-- ============================================================== -->
        <?php include'sidebar.php'; ?>
        <!-- ============================================================== -->
		<!-- 						Navigation End	 						-->
		<!-- ============================================================== -->

			
		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		<div class="row page-header">
				<div class="col-lg-6 align-self-center ">
				  <h2>Add Blog Post</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Blog</li>
					</ol>
				</div>
		</div>
		
        <section class="main-content">
            
            <div class="row">
                <div class="col-md-8">
                	<?php
                	include'dbconfig.php'; //including the database config 
                	if(isset($_POST['submit'])) //if the submit button is clicked
                	{
						$name=mysqli_real_escape_string($con, $_POST['name']); //get the name inputted on this field
					
						$description=mysqli_real_escape_string($con, $_POST['description']); //get the name inputted on this field
						$country=$_POST['country']; //get the name inputted on this field
                		$target = "blog/"; // this is the folder the image files would be moved into
						$target = $target . basename( $_FILES['image']['name']); //get the image and file name to be moved
						$pic=basename($_FILES['image']['name']);
						$location = $pic;
						if ($_FILES['image']['type']=='image/jpg' || $_FILES['image']['type']=='image/jpeg' || $_FILES['image']['type']=='image/png'){
							$query=mysqli_query($con,"INSERT INTO `blog`(blogId, blogName, blogBody, blogExcerpt, blogCategory, image ) VALUES (NULL, '$name', '$description', '$description', '$country', '$target')"); // insert what was written into the database with table name blog

						if ($query) {   // check if insersion was successful, if successful echo blog Added Successfully.
					    move_uploaded_file($_FILES['image']['tmp_name'],$target);
					    echo "<h2>Blog Added Successfully.</h2>";
						 } 
						 else // else echo Error updating record:
						 {
						    echo "Error updating record: " . mysql_error();
						 }
						}
						else{
							echo '<script> alert("Wrong Image Format")</script>';
						}
						

                	}
                	?>
				  <div class="card">
                        <div class="card-header">
                             Add Blog Post
							<p class="text-muted">Add New Blog Post</p>
                        </div>
                        <div class="card-body">
                        	<form method="post" name="update_profile" enctype="multipart/form-data">
                        		<div class="form-group">
                        			<label for="Institution">Blog Title</label>
                        			<input type="text" class="form-control" name="name" placeholder="Blog Title" required>
                        		</div>
				
                        		<div class="form-group">
                        			<label for="description">Blog Post</label>
                        			<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=bvwekrtlbov2pbjf5znyk246pewutr99oigmpoyp9hqml0p3"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <textarea rows="10" cols="80" name="description"></textarea>
                        		</div>
								<div class="form-group">
                                            <label for="Institution">Select Category</label>
                                            <select name="country" class="form-control">
                                                <?php 
                        			    include 'dbconfig.php'; //including the database config 
                        			    $query=mysqli_query($con,"SELECT * FROM `category`"); //select and display the fields inside the category table
                        			    while($row=mysqli_fetch_array($query)) // using while loop to run through the query
                        			    { ?>
                                                    <option>
                                                        <?php echo $row['name']; // display the fields inside that table category ?> 
                                                    </option>
                                                    <?php } ?>
                                            </select>
                                </div>
                        		<div class="form-group">
                        			<label for="iamge">Image</label>
                        			<input type="file" class="form-control" name="image">
                        		</div>
								
                        		<div class="form-group">
                        			<input type="submit" name="submit" value="Submit" class="btn btn-success box-shadow btn-icon btn-rounded pull-right">
                        		</div>
                        	</form>
                             

						</div>
                    </div>
                </div>


				

			
           
					
					</div>
					
				</div>
<?php include'footer.php'; ?>

        </section>
        <!-- ============================================================== -->
		<!-- 						Content End		 						-->
		<!-- ============================================================== -->

		
        <!-- Common Plugins -->
        <script src="assets/lib/jquery/dist/jquery.min.js"></script>
		<script src="assets/lib/bootstrap/js/popper.min.js"></script>
        <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/lib/pace/pace.min.js"></script>
        <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="assets/lib/metisMenu/metisMenu.min.js"></script>
        <script src="assets/js/custom.js"></script>
			
        <!--Chart Script-->
        <script src="assets/lib/chartjs/chart.min.js"></script>
		<script src="assets/lib/chartjs/chartjs-sass.js"></script>

		<!--Vetor Map Script-->
		<script src="assets/lib/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="assets/lib/vectormap/jquery-jvectormap-us-aea-en.js"></script>
		
		<!-- Chart C3 -->
        <script src="assets/lib/chart-c3/d3.min.js"></script>
        <script src="assets/lib/chart-c3/c3.min.js"></script>
	
        <!-- Datatables-->
        <script src="assets/lib/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/lib/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/lib/toast/jquery.toast.min.js"></script>
        <script src="assets/js/dashboard.js"></script>
		
    </body>
</html>