<?php
include('../include/database.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$sid = "";
if (isset($_SESSION['sid']))
{
	$sid = $_SESSION['sid'];
} 
else if (isset($_COOKIE['sid']))
{
	header('Location: ./../lockscreen.php'); 
}
else
{
	header('Location: ./../login.php'); 
}

$itsdone = "";
$checker = "";
$expert = "";
?>

<!DOCTYPE html>

<html lang="en">
<head>
	
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		
		<title>Health Ring | Expert Dashboard</title>
		
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../dist/css/adminlte.min.css">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!--		<script>
			/*document.addEventListener('DOMContentLoaded', function() {
				var elems = document.querySelectorAll('.fixed-action-btn');
				var instances = M.FloatingActionButton.init(elems, options);
			});*/
			document.addEventListener('DOMContentLoaded', function() {
				var elems = document.querySelectorAll('.fixed-action-btn');
				var instances = M.FloatingActionButton.init(elems, {
					direction: 'top'
				});
			});
		</script>
		<!-- Latest compiled and minified CSS -->
<!--		<link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../asset/css/materialize.min.css">
		<link rel="stylesheet" href="../asset/css/ghpages-materialize.css">
		<link rel="stylesheet" href="../asset/css/prism.css">
		<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
-->
		<!-- jQuery library -->
<!--	
		<script src="../asset/jquery/jquery.min.js"></script>
		
		<!-- Latest compiled JavaScript ->
		<script src="../asset/js/materialize.min.js"></script>
		<script src="../asset/bootstrap/js/bootstrap.min.js"></script>
		
		<!-- Custom Javascript Library ->
		<script src="../library/js/instant.js"></script>
		
		<!-- Other Header ->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
-->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    
<!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 access granted
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 access expired
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  


		<!-- Main Sidebar Container -->

		<aside class="main-sidebar sidebar-dark-primary elevation-4">

		<!-- Brand Logo -->

		<a href="../index.html" class="brand-link">

		<img src="../dist/img/AdminLTELogo.png" alt="Health Ring Logo" class="brand-image img-circle elevation-3"
 style="opacity: .8">

		<span class="brand-text font-weight-light">Health Ring</span>
</a>


		<!-- Sidebar -->
<div class="sidebar">

		<!-- Sidebar user panel (optional) -->

		<div class="user-panel mt-3 pb-3 mb-3 d-flex">

		<div class="image">

		<img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

		</div>
<div class="info">

		<a href="profile.php" class="d-block"><?php if (isset($_SESSION['surname'])) echo $_SESSION['surname']; ?></a>
</div>
</div>


		<!-- Sidebar Menu -->

		<nav class="mt-2">

		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

		<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

		<li class="nav-item has-treeview menu-open">

		<a href="#" class="nav-link active">

		<i class="nav-icon fa fa-dashboard"></i>

		<p>
Dashboard
<i class="right fa fa-angle-left"></i>
</p>
</a>

		<ul class="nav nav-treeview">

		<li class="nav-item">

		<a href="dashboard.php" class="nav-link">

		<i class="fa fa-circle-o nav-icon"></i>

		<p>General Activities</p>
</a>
</li>

		<li class="nav-item">

		<a href="dashboard2.php" class="nav-link">

		<i class="fa fa-circle-o nav-icon"></i>

		<p>Personal Activities</p>

		</a></li></ul>
</li>

		<li class="nav-item has-treeview menu-open">

		<a href="#" class="nav-link active">

		<i class="nav-icon fa fa-dashboard"></i>

		<p>
Expert
<i class="right fa fa-angle-left"></i>
</p>
</a>

		<ul class="nav nav-treeview">

		<li class="nav-item">

		<a href="expert.php" class="active nav-link">

		<i class="fa fa-circle-o nav-icon"></i>

		<p>All Expert</p>
</a>
</li>

		<li class="nav-item">

		<a href="add-expert.php" class="nav-link">

		<i class="fa fa-circle-o nav-icon"></i>

		<p>Add Expert</p>
</a>
</li>

		<li class="nav-item">
<a href="update-expert.php" class="nav-link">

		<i class="fa fa-circle-o nav-icon"></i>

		<p>Update Expert</p>

		</a>
</li>
</ul>
</li>

		<li class="nav-item has-treeview menu-open">

		<a href="#" class="nav-link active">

		<i class="nav-icon fa fa-dashboard"></i>

		<p>
Health Record
<i class="right fa fa-angle-left"></i>
</p>
</a>

		<ul class="nav nav-treeview">

		<li class="nav-item">

		<a href="health.php" class="nav-link">

		<i class="fa fa-circle-o nav-icon"></i>

		<p>All Health Log</p>
</a>
</li>

		<li class="nav-item">

		<a href="approve-health.php" class="nav-link">

		<i class="fa fa-circle-o nav-icon"></i>

		<p>Approve Health Log</p>
</a>
</li>

</ul>
</li>
		<li class="nav-item">

		<a href="../logout.php" class="nav-link">

		<i class="nav-icon fa fa-th"></i>

		<p>
Logout
</p>
</a>
</li>
</ul>
</nav>

		<!-- /.sidebar-menu -->
</div>

		<!-- /.sidebar -->

		</aside>



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Access</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Access</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">EXPERTS AND CENTERS <span class="badge badge-primary">View All</span></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Location</th>
					  <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
     
						<?php
						$sql = "SELECT * FROM accesslog WHERE ownerid='$sid' AND status='active'";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) { 
								echo "<tr>";
								echo "<td><a href=''>". $row['accessorid'] ."</a></td>";
								$accessor = $row['accessorid'];
								$acc = $accessor[0];
								//echo "<td><a href=''>". $acc ."</a></td>";
								if ($acc == 'C')
								{
									$sql1 = "SELECT * FROM center WHERE cid='$accessor'";
									$result1 = $conn->query($sql1);
									
									if ($result1->num_rows > 0) {
										// output data of each row
										while($row1 = $result1->fetch_assoc()) {
											echo "<td>".$row1['center_name']."</td>";
											echo "<td>".$row1['center_loc']."</td>";
										}
									}
								}
								else 
								{
									$sql1 = "SELECT * FROM expert WHERE eid='$accessor'";
									$result1 = $conn->query($sql1);
									
									if ($result1->num_rows == 1) {
										// output data of each row
										while($row1 = $result1->fetch_assoc()) {
											$esid = $row1['sid'];
											
											$sql2 = "SELECT * FROM users WHERE sid='$esid'";
											$result2 = $conn->query($sql2);
											if ($result2->num_rows == 1) {
												// output data of each row
												while($row2 = $result2->fetch_assoc()) {
													echo "<td>".$row2['surname']."</td>";
													echo "<td>".$row2['state']."</td>";
												}
											}
										}
									}
								}
								echo "<td><span class='badge badge-success'>".$row['status']."</span></td>";
								echo "</tr>";
							}
						}
						else 
						{
							"<tr>
								<td>No Result Found</td>
								<td>No Result Found</td>
								<td>No Result Found</td>
								<td>No Result Found</td>
							</tr>";
						}
						?>                 				
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2020 <a href="https://afric.xyz">Afric.xyz</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="../plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../dist/js/pages/dashboard2.js"></script>
</body>
</html>
