<?php
include('include/database.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
$itsdone = "default";
$fullname = "";
if (!(isset($_COOKIE['fullname']))) header('Location: ./login.php'); 
$fullname = $_COOKIE['surname'];
if (isset($_POST['pw']))
{
	if ($_COOKIE['email']) $email = $_COOKIE['email'];
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
		$itsdone = " Incorrect Password";
	}
}
else{
	//$itsdone = "not submitted";
}
$conn->close();
 
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Health Ring | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="index.php"><b>African Health</b> Ring</a>
  </div>
  <p><center><i>The Universe health Community.</i></p>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?php echo $fullname; ?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="dist/img/avatar5.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form name="form1" role="form" class="lockscreen-credentials" method="post" method="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <div class="input-group">
        <input name="pw" type="password" class="form-control" placeholder="password">

        <div class="input-group-append">
          <button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="login.php">Or sign in as a different user</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2014-2020 <b><a href="http://afric.xyz" class="text-black">Afric.xyz</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

