<?php
include('include/database.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
$itsdone = "Please, Provide Correct Info";
/*
setcookie("surname", "Olasegiri", time() + (86400 * 30), "/"); // 86400 = 1 day
setcookie("othernames", "Oluwafemi Emmanuel", time() + (86400 * 30), "/"); // 86400 = 1 day
setcookie("email", "olasegirioluwafemi@gmail.com", time() + (86400 * 30), "/"); // 86400 = 1 day
*/
$fullname = $_COOKIE['surname'];
$fullname .= ' ';
$fullname .= $_COOKIE['othernames'];
$email = $_COOKIE['email'];
if (isset($_POST['submit']))
{
	// set parameters and execute
			$address = $_POST['address'];
			$tel = $_POST['tel'];
			$nationality = $_POST['nationality'];
			$state = $_POST['state'];
			$voterid = $_POST['voterid'];
			$nimcid = $_POST['nimcid'];
			$gender = $_POST['gender'];
			$postalcode = $_POST['postalcode'];
			$nextofkin = $_POST['nextofkin'];
			$bloodtype = $_POST['bloodtype'];
			$bloodgroup = $_POST['bloodgroup'];
			$bloodrazors = $_POST['bloodrazors'];
			$maritalstatus = $_POST['maritalstatus'];
			
			//completion of profile creation completed
			$password = $_POST['pass'];
			$confirmpassword = $_POST['cpass'];
			if ($password == $confirmpassword)
			{
		$sql = "UPDATE `users` SET `address1`='$address', `phonenumber`='$tel', `nationality`='$nationality', `state`='$state', `voterid`='$voterid', `nimcid`='$nimcid', `gender`='$gender', `postalcode`='$postalcode', `nextofkinid`='$nextofkin', `blood_type`='$bloodtype', `blood_group`='$bloodgroup', `blood_razors`='$bloodrazors', `marital_status`='$maritalstatus', `status`='complete'
		WHERE `email`='$email'";
		
		// prepare and bind
		if ($conn->query($sql))
		{
			$itsdone = "registration completed successfully";
			header('Location: ./patient/dashboard.php'); 
		} else {
			$itsdone = "registration incomplete<br>";
		}
		$stmt->close();
	} else {
		$itsdone .= "password mismatch";
	}
}
$conn->close();
/*		
		
			// prepare and bind
			$stmt = $conn->prepare("INSERT INTO users (address1, phonenumber, nationality, state, voterid, nimcid, gender, postalcode, nextofkinid, blood_type, blood_group, blood_razors, marital_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssssssssssss", $address, $tel, $nationality, $state, $voterid, $nimcid, $gender, $postalcode, $nextofkin, $bloodtype, $bloodgroup, $bloodrazors, $maritalstatus);
	
			// set parameters and execute
			$address = $_POST['address'];
			$tel = $_POST['tel'];
			$nationality = $_POST['nationality'];
			$state = $_POST['state'];
			$voterid = $_POST['voterid'];
			$nimcid = $_POST['nimcid'];
			$gender = $_POST['gender'];
			$postalcode = $_POST['postalcode'];
			$nextofkin = $_POST['nextofkin'];
			$bloodtype = $_POST['bloodtype'];
			$bloodgroup = $_POST['bloodgroup'];
			$bloodrazors = $_POST['bloodrazors'];
			$maritalstatus = $_POST['maritalstatus'];
	*/		
	/*
			if ($stmt->execute())
			{
				$itsdone = "registration completed successfully";
				//setcookie("us", $username, time() + (86400 * 30), "/"); // 86400 = 1 day
				header('Location: ./login.php'); 
			} else {
				$itsdone = "registration incomplete<br>";
			}
			$stmt->close();
			*/
			/*
			column1=value, column2=value2,...
WHERE some_column=some_value
			
			$address = $_POST['address'];
			$tel = $_POST['tel'];
			$nationality = $_POST['nationality'];
			$state = $_POST['state'];
			$voterid = $_POST['voterid'];
			$nimcid = $_POST['nimcid'];
			$gender = $_POST['gender'];
			$postalcode = $_POST['postalcode'];
			$nextofkin = $_POST['nextofkin'];
			$bloodtype = $_POST['bloodtype'];
			$bloodgroup = $_POST['bloodgroup'];
			$bloodrazors = $_POST['bloodrazors'];
			$maritalstatus = $_POST['maritalstatus'];
			";
	*/
	
 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Health Ring | Registration</title>
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
    <a href="index2.html"><b>Health Ring</b></a>
	
  </div>
  <p><center><i>The Universe health Community.</i></p>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Complete Your Registration <span class="badge badge-warning"><?php echo $itsdone; ?></span></p>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div class="form-group has-feedback">
          <input name="fullname" type="name" class="form-control" placeholder="Fullname (Surname first)" value="<?php echo $fullname; ?>" disabled>
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" disabled>
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
	<div class="form-group has-feedback">
          <input name="address" type="address" class="form-control" placeholder="Address">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
	<div class="form-group has-feedback">
          <input name="tel" type="tel" class="form-control" placeholder="+1 1020 123">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
	<div class="form-group has-feedback">
          <input name="nationality" type="text" class="form-control" placeholder="Nigeria">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
	<div class="form-group has-feedback">
          <input name="state" type="text" class="form-control" placeholder="Abia">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
	<div class="form-group has-feedback">
          <input name="voterid" type="text" class="form-control" placeholder="Voter's Id">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
	<div class="form-group has-feedback">
          <input name="nimcid" type="text" class="form-control" placeholder="NIMC Id">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
	<div class="form-group has-feedback">
          <input name="gender" type="text" maxlength=1 class="form-control" placeholder="Female">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
	<div class="form-group has-feedback">
          <input name="postalcode" type="number" maxlength=6 class="form-control" placeholder="Postal Code">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
	<div class="form-group has-feedback">
          <input name="nextofkin" type="number" maxlength=11 class="form-control" placeholder="Patient Id (Next of Kin)">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
		<div class="form-group has-feedback">
          <input name="bloodtype" type="text" class="form-control" placeholder="Blood Type">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
		<div class="form-group has-feedback">
          <input name="bloodgroup" type="text" class="form-control" placeholder="Blood Group">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
		<div class="form-group has-feedback">
          <input name="bloodrazors" type="text" class="form-control" placeholder="Blood Razor - Positive">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
		<div class="form-group has-feedback">
          <input name="maritalstatus" type="text" class="form-control" placeholder="Marital Status">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="row">
          <!-- /.col -->
			<button name="submit" type="submit" class="btn btn-block btn-primary col-12 mb-2">
				<i class="fa fa-login mr-2"></i> Finish 
			</button>
        </div>
      </form>
      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership<span class="badge badge-warning">Health Workers Only</spa</a>
      </p> -->
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
