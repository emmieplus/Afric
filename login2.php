<?php
include('include/database.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
$itsdone = "default";

if (isset($_POST['submit']))
{
	if ($_SESSION['email']) $email = $_SESSION['email'];
	$password = md5($_POST['pw']);
	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = $conn->query($sql);
	
	if ($result->num_rows == 1) {
		// output data of each row
		while($row = $result->fetch_assoc()) { 
			//$username concatenation
			$sid = $row['sid'];
			$surname = $row['surname'];
			$othernames = $row['othernames'];
			$email = $row['email'];
			$fullname = $row['surname'];
			$fullname .= $row[' '];
			$fullname .= $row['othernames'];
			
			$itsdone = "Active";
			
			//setting session
			$_SESSION['sid'] = $sid;
			$_SESSION['surname'] = $surname;
			$_SESSION['fullname'] = $fullname;
			$_SESSION['email'] = $email;
			//$_SESSION['othernames'] = "";
			
			//setting cookie
			setcookie("sid", $sid, time() + (86400 * 30), "/"); // 86400 = 1 day
			setcookie("surname", $surname, time() + (86400 * 30), "/"); // 86400 = 1 day
			setcookie("fullname", $fullname, time() + (86400 * 30), "/"); // 86400 = 1 day
			setcookie("email", $email, time() + (86400 * 30), "/"); // 86400 = 1 day
			//setcookie("othernames", "", time() + (86400 * 30), "/"); // 86400 = 1 day
			
			//selecting completion status
			if ($row['status'] == "complete")
			{
				header('Location: ./patient/dashboard.php'); 
			}
			else
			{
				header('Location: ./register-cont.php'); 
			}
		}
	} else {
		$itsdone = " Not active";
	}
}
else{
	$itsdone = "not submitted";
}
$conn->close();
 
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Health Ring | Log in</title>
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
      <p class="login-box-msg">Sign in to start your session<?php echo $itsdone; ?></p>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="form-group has-feedback">
          <span class="fa fa-envelope form-control-feedback"><?php if (isset($_SESSION['surname']))  echo $_SESSION['surname']; ?></span>
        </div>
		
        <div class="form-group has-feedback">
          <input name="pw" type="password" class="form-control" placeholder="Password" required>
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
        	<button name="submit" class="btn btn-block btn-primary col-12 mb-2">
				<i class="fa fa-signin mr-2"></i> Sign In <span class="badge badge-warning">Patient</span>
			</button>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forget-password.php">I forgot my password</a>
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
