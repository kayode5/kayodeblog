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
				  <h2>Add Category</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Category</li>
					</ol>
				</div>
		</div>
		
        <section class="main-content">
            
            <div class="row">
                <div class="col-md-8">
                
				  <div class="card">
                        <div class="card-header">
                             Add Category
							<p class="text-muted">Add New Category</p>

                            <?php
							//including the database config 
                	include'dbconfig.php';
                	if(isset($_POST['submit'])) //if the submit button is clicked
                	{
						$name=$_POST['name']; //get the name inputted on this field
						$query=mysqli_query($con,"INSERT INTO `category`(Id, name) VALUES (NULL, '$name')"); // insert what was written into the datavase with table name catgory
						if ($query) { // check if insersion was successful, if successful echo Category Added Successfully.
					    echo "<h2>Category Added Successfully.</h2>";
						 } 
						 else // else echo Error updating record:
						 {
						    echo "Error updating record: " . mysql_error();
						 }

                	}
                	?>
                        </div>
                        <div class="card-body">
                        	<form method="post" name="update_profile" enctype="multipart/form-data">
                        		<div class="form-group">
                        			<label for="Institution">Name Of Category</label>
                        			<input type="text" class="form-control" name="name" placeholder="Name of Category" required/>
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
		<script src="assets/js/sweetalert2.min.js"></script>
			
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
