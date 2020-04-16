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
                	include 'dbconfig.php'; //including the database config 
                	if(isset($_POST['submit'])) //if the submit button is cicked
                	{
                        $name = mysqli_real_escape_string($con, $_POST["name"]);
                        $email = mysqli_real_escape_string($con, $_POST["email"]);  
                         
                		
							$query=mysqli_query($con,"UPDATE author SET  name='$name', email='$email' WHERE Id='$getid'");
						if ($query) { // if query is true move the image to the folder and echo successfull
					    echo "<h2>Blog Updated Successfully.</h2>";
						 } 
						 else 
						 {
						    echo "Error updating record: " . mysql_error();
						 }
						

                	}
                	?>

                	<?php
                	$query2=mysqli_query($con,"SELECT * FROM `author` WHERE Id='$getid'"); // display the field that was clicked by id
                	$rows=mysqli_fetch_array($query2);
                	?>
				  <div class="card">
                        <div class="card-header">
                             Update Author
							<p class="text-muted">Edit Author</p>
                        </div>
                        <div class="card-body">
                        	<form method="post" name="update_profile" enctype="multipart/form-data">
                        		<div class="form-group">
                        			<label for="Institution">Author Name</label>
                        			<input type="text" class="form-control" name="name" value="<?php echo $rows['name']; ?>" placeholder="Blog Title">
                        		</div>
                                <div class="form-group">
                        			<label for="Institution">Author Email</label>
                        			<input type="text" class="form-control" name="email" value="<?php echo $rows['email']; ?>" placeholder="Blog Title">
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