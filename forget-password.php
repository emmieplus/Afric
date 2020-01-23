<?php
include('include/database.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
$itsdone = "";

if (isset($_POST['submit']))
{
	//completion of profile creation completed
	$password = $_POST['pass'];
	$confirmpassword = $_POST['cpass'];
	if ($password == $confirmpassword)
	{
		// prepare and bind
		$stmt = $conn->prepare("INSERT INTO users (sid, surname, othernames) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $sid, $surname, $othernames);

		// set parameters and execute
		$sid = $_POST['sid'];
		$surname = $_POST['surname'];
		$othernames = $_POST['othernames'];
	
		if ($stmt->execute())
		{
			echo "registration completed successfully<br>";
		} else {
			echo "registration incomplete<br>";
		}
		$stmt->close();
	} else {
		echo "password mismatch<br>";
	}
}
$conn->close();
 
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Health Ring | Forget-Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--end-->
		<script>
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
		
	</head>
	<body class="hold-transition login-page">
		
		
<div class="login-box">
  <div class="login-logo">
    <a href="index.html"><b>Health Ring</b></a>
	
  </div>
  <p><center><i>The Universe health Community.</i></p>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Apply for new Password </p>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group has-feedback">
          <input name="email" type="email" class="form-control" placeholder="Email" required>
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
		
		<!--div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div-->
<!--
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password">
          <span class="fa fa-lock form-control-feedback"></span>
        </div> -->
        <div class="row">
          <!-- /.col -->
			<button name="submit" class="btn btn-block btn-primary col-12 mb-2">
				<i class="fa fa-login mr-2"></i> Forget-Password 
			</button>
<!--			<a href="#" class="btn btn-block btn-primary col-12 mb-2">
				<i class="fa fa-signin mr-2"></i> Sign In <span class="badge badge-warning">Staff</span>
			</a> -->

          <!-- /.col -->
        </div>
      </form>

      <!--div class="social-auth-links text-center mb-3">
          
      </div-->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="login.php">Login</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership<span class="badge badge-warning">Health Workers Only</spa</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>
