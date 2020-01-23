<?php
include('include/database.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
$itsdone = "";
$regdefault = 170000;
if (isset($_POST['submit']))
{
	//completion of profile creation completed
	$password = $_POST['pass'];
	$confirmpassword = $_POST['cpass'];
	if ($password == $confirmpassword)
	{
		$sql = "SELECT * FROM users WHERE surname='$surname' AND email='$email'";
		$result = $conn->query($sql);
		if ($result->num_rows == 0 ) {
		
			// prepare and bind
			$stmt = $conn->prepare("INSERT INTO users (surname, othernames, email, password) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $surname, $othernames, $email, $password);

			// set parameters and execute
			$surname = $_POST['surname'];
			$othernames = $_POST['othernames'];
			$email = $_POST['email'];
			$password = md5($_POST['pass']);
		
			if ($stmt->execute())
			{
				$sql2 = "UPDATE `users` SET `sid`= `uid`+'$regdefault', `status`='started' WHERE `email`='$email'";
				
				// prepare and bind
				if ($conn->query($sql2))
				{
					$itsdone = "registration completed successfully";
					setcookie("surname", $surname, time() + (86400 * 30), "/"); // 86400 = 1 day
					setcookie("othernames", $othernames, time() + (86400 * 30), "/"); // 86400 = 1 day
					setcookie("email", $email, time() + (86400 * 30), "/"); // 86400 = 1 day
					header('Location: ./register-cont.php'); 
				} else {
					$itsdone .= "Error Registration. Please, contact support@afric.xyz";
					echo "Error Registration. Please, contact support@afric.xyz";
				}
			} else {
				$itsdone .= "<br>registration incomplete";
			}
			$stmt->close();
		} else {
			$itsdone .= '<br>Email Already Exist';
		} 
	} else {
		$itsdone .= "<br>password mismatch";
	}
}
$conn->close();
 
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Health Ring | Register</title>
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
      <p class="login-box-msg">Sign Up to Health Africa</p>
	  <span class="badge badge-danger"><?php echo $itsdone; ?></span>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
        <div class="form-group has-feedback">
          <input type="name" name="surname" class="form-control" placeholder="Surname" required>
          <span class="fa fa-envelope form-control-feedback danger"></span>
        </div>
		<div class="form-group has-feedback">
          <input type="name" name="othernames" class="form-control" placeholder="Othernames" required>
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
	<div class="form-group has-feedback">
          <input type="password" name="pass" class="form-control" placeholder="Password"  required>
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="cpass" class="form-control" placeholder="Confirm Password" required>
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <!-- /.col -->
			<button type="submit" name="submit" class="btn btn-block btn-primary col-12 mb-2">
				<i class="fa fa-login mr-2"></i> Sign Up <!--span class="badge badge-warning">Patient</span-->
			</button>
			<!--<a href="#" class="btn btn-block btn-primary col-12 mb-2">
				<i class="fa fa-signin mr-2"></i> Sign Up <span class="badge badge-warning">Staff</span>
			</a>-->
          <!-- /.col -->
        </div>
      </form>

      <!--div class="social-auth-links text-center mb-3">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
      </div-->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forget-password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="login.php" class="text-center">Sign In <span class="badge badge-warning">Health Workers Only</span></a>
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
