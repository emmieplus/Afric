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
?>
<!DOCTYPE html>
	
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

	<head>

	 <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../AdminLTE-3.0.0-alpha/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../AdminLTE-3.0.0-alpha/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../AdminLTE-3.0.0-alpha/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../AdminLTE-3.0.0-alpha/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../AdminLTE-3.0.0-alpha/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE-3.0.0-alpha/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Health Ring | Expert Add Patient Access</title>
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
        <a class="nav-link" data-widget="pushmenu" href="#">
	<i class="fa fa-bars"></i></a>
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

		<a href="expert.php" class="nav-link">

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

		<a href="update-expert.php" class="nav-link active">

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
            <h1 class="m-0 text-dark">All Patient Access</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.html">Home</a></li>
              <li class="breadcrumb-item active">All Patients Access</li>
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
          <div class="col-md-8">

      <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Instant Access</h3>
              </div>
              <!-- /.card-header -->
              
              <form role="form">
                <div class="card-body">
<!--		<div class="form-group">
                  <label>Multiple</label>
                  <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                          style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
-->
		<div class="form-group">
                  <label>Search Option</label>
                  <select name="addingoption" class="form-control select2" style="width: 100%">
                    <option value="patientid" selected="selected" onchange="recieverSelector()">Patient Id</option>
                    <option value="voterid"  onchange="recieverSelector()">Voter Id</option>
                    <option value="nimcid" onchange="recieverSelector()">NIMC Id</option>
                    <option value="email" onchange="recieverSelector()">Email</option>
                    <option value="phonenumber" onchange="recieverSelector()">Phone Number</option>
                    <option value="fullname" onchange="recieverSelector()">Fullname (Not Recommended)</option>
                  </select>
                </div>
                  <div class="form-group" id="reciever">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
      
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
    <strong>Copyright &copy; 2014-2018 <a href="https://banuni.org">banuni.org</a>.</strong> All rights reserved.
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

<script src="../AdminLTE-3.0.0-alpha/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE-3.0.0-alpha/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../AdminLTE-3.0.0-alpha/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../AdminLTE-3.0.0-alpha/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../AdminLTE-3.0.0-alpha/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../AdminLTE-3.0.0-alpha/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../AdminLTE-3.0.0-alpha/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../AdminLTE-3.0.0-alpha/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../AdminLTE-3.0.0-alpha/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../AdminLTE-3.0.0-alpha/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../AdminLTE-3.0.0-alpha/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../AdminLTE-3.0.0-alpha/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE-3.0.0-alpha/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE-3.0.0-alpha/dist/js/demo.js"></script>
<!-- Page script -->


<script>
	async function recieverSelector()
	{
		document.getElementById("reciever").innerHTML = recieved_content;
/*
		console.log("selection started");
		var reciever = "";
		var recieved_content = "";
		reciever = document.getElementById("addingoption").value;
		switch (receiver)
		{
			case "patientid":
				recieved_content = '<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">';
			break;	
			case "voterid":
				recieved_content = "voter";
			break;
			case "nimcid":
				recieved_content = "nimc";
			break;
			case "email":
				recieved_content = "email";
			break;
			case "phonenumber":
				recieved_content = "num";
			break;
			case "fullname":
				recieved_content = "name";
			break;
			default:
				recieved_content = "patientid";
		}
		document.getElementById("reciever").innerHTML = recieved_content;
*/
	}
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker         : true,
      timePickerIncrement: 30,
      format             : 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>

</html>

