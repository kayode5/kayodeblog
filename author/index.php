<?php

//Start session
session_start();

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
						<li class="breadcrumb-item"><a href="">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
		</div>
		<?php
include ("../admin/dbconfig.php");


$sql = "select * from blog"; //select all from the table blog
$result = mysqli_query($con,$sql); // query that sql selection
$count = mysqli_num_rows($result); // count the number of rows in that table

$sql1 = "select * from comment";
$result1 = mysqli_query($con,$sql1);
$count1 = mysqli_num_rows($result1);

?>
        <section class="main-content">
            <div class="row w-no-padding margin-b-30">
			
				<div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
								<h2 class="margin-b-5">Blog Posts</h2>
								<p class="text-muted">Total Blog Posts</p>
								<span class="float-right text-primary widget-r-m"><?php echo $count //display the number of rows ?></span>
							</div>
							<div class="progress margin-b-10  progress-mini">
								<div style="width:50%;" class="progress-bar bg-primary"></div>
							</div>
							<p class="text-muted float-left margin-b-0">Change</p>
						
                        </div>
                    </div>
                </div>
				
				<div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
								<h2 class="margin-b-5">Comments</h2>
								<p class="text-muted">Total Comments</p>
								<span class="float-right text-warning widget-r-m"><?php echo $count1 //display the number of rows ?></span>
							</div>
							<div class="progress margin-b-10 progress-mini">
								<div style="width:38%;" class="progress-bar bg-warning"></div>
							</div>
							<p class="text-muted float-left margin-b-0">Change</p>
							
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