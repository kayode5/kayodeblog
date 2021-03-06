<?php

//Start session
session_start();


if(isset($_SESSION["email"])){


	if((time() - $_SESSION['last_time']) > 60) //Time is seconds
			{
				 header("location: logout.php");
			}else {
				   $_SESSION['last_time'] = time();
				  // echo "" .$_SESSION["name"];
				  }
}

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['email']) || !isset($_SESSION['Id']) ) {
    header("location: login.php");
    exit();
}


$username = $_SESSION['email'];
$id = $_SESSION['Id'];
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
				  <h2>Dashboard</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Blog</li>
					</ol>
				</div>
		</div>
		
        <section class="main-content">
            
            <div class="row">
                <div class="col-md-8">
				  <div class="card">
                        <div class="card-header">
                             Blog
							<p class="text-muted">View all Posts</p>
                        </div>
                        <div class="card-body">

                        	<div class="col-md-12">
                        		<div class="row">
                        			<div class="col-md-2">
                        			<h3>Image</h3>
                        			</div>
                        			<div class="col-md-6">
                        			<h3>Blog Post</h3>
                        			</div>
                        			<div class="col-md-4">
                        			<h3>Action</h3>
                        			</div>
                        			<div class="col-md-12">
                        				<hr>
                        			</div>
                        			<?php
									include '../admin/dbconfig.php';
								
                        			$query=mysqli_query($con,"SELECT * FROM blog WHERE author_id = '$id'");
                        			while($row=mysqli_fetch_array($query))
                        				{ $id = $row['blogId']; ?>
                        			<div class="col-md-2">
                        			<img src="../admin/<?php echo $row['image']; ?>" class="margin-b-10" width="60">
                        			</div>
                        			<div class="col-md-6">
                        			<b><?php echo $row['blogName']; ?></b> <br>
                        			</div>
                        			<div class="col-md-4">
                        			<a href="edit-blog.php?id=<?php echo $id; ?>"><button class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</button></a>
                        			<a href="delete-blog.php?id=<?php echo $id; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button></a>
                        			</div>
                        			<div class="col-md-12">
                        				<hr>
                        			</div>
                        		<?php } ?>
                        		</div>
                        	</div>

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