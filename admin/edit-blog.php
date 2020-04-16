<?php
$getid=$_GET['id'];
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
				  <h2>Edit Blog</h2>
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
                	if(isset($_POST['submit'])) //if the submit button is cicked
                	{
                		$name=mysqli_real_escape_string($con,$_POST['name']);//get the name inputted on this field
                		$description=mysqli_real_escape_string($con,$_POST['description']); //get the name inputted on this field
                		if(($_FILES['image']['name'])!="") //if the image file is not empty choose image file and update
                		{
                		$target = "blog/"; 
						$target = $target . basename( $_FILES['image']['name']);
						$pic=basename($_FILES['image']['name']);
						$location = $pic;
						$query=mysqli_query($con,"UPDATE blog SET  blogName='$name', blogExcerpt='$description', blogBody='$description', image='$target' WHERE blogId='$getid'");// query to update the table by id
						if ($query) { // if query is true move the image to the folder and echo successfull
					    move_uploaded_file($_FILES['image']['tmp_name'],$target);
					    echo "<h2>Blog Updated Successfully.</h2>";
						 } 
						 else 
						 {
						    echo "Error updating record: " . mysql_error();
						 }
						}
						else 
						{
							$query=mysqli_query($con,"UPDATE blog SET  blogName='$name', blogExcerpt='$description', blogBody='$description' WHERE blogId='$getid'");
						if ($query) { // if query is true move the image to the folder and echo successfull
					    echo "<h2>Blog Updated Successfully.</h2>";
						 } 
						 else 
						 {
						    echo "Error updating record: " . mysql_error();
						 }
						}

                	}
                	?>

                	<?php
                	$query2=mysqli_query($con,"SELECT * FROM `blog` WHERE blogId='$getid'"); // display the field that was clicked by id
                	$rows=mysqli_fetch_array($query2);
                	?>
				  <div class="card">
                        <div class="card-header">
                             Update Blog
							<p class="text-muted">Edit Blog Post</p>
                        </div>
                        <div class="card-body">
                        	<form method="post" name="update_profile" enctype="multipart/form-data">
                        		<div class="form-group">
                        			<label for="Institution">Blog Title</label>
                        			<input type="text" class="form-control" name="name" value="<?php echo $rows['blogName']; ?>" placeholder="Blog Title">
                        		</div>
                        		<div class="form-group">
                        			<label for="description">Description</label>
                        			<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=bvwekrtlbov2pbjf5znyk246pewutr99oigmpoyp9hqml0p3"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <textarea rows="10" cols="80" name="description"><?php echo $rows['blogBody']; ?></textarea>
                        		</div>
                        		<div class="form-group">
                        			<label for="iamge">Image</label>
                        			<input type="file" class="form-control" value="<?php echo $rows['image']; ?>" name="image">
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