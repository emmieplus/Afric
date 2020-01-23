<!DOCTYPE html>
<html>
<body>
<?php
include('../../include/database.php');
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

<?php
$q = intval($_GET['q'])
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uhr";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
*/
$sql1 = "SELECT * FROM healthlog WHERE sid='$sid' AND parenthealthlog='$q'";
$result = $conn->query($sql1);
	if ($result->num_rows > 0) {
		echo "sorry, record is solidified and can not be trashed";
	}
	else {
		// output data of each row
		$sql = "UPDATE `healthlog` SET `status`='trashed' WHERE `hid` = '".$q."'";
		// prepare and bind
		if ($conn->query($sql))
		{
			echo " <small class='badge badge-primary'><i class='fa fa-clock-o'></i> Log Successfully Trashed</small>";
		} else {
			echo " <small class='badge badge-danger'><i class='fa fa-clock-o'></i> Sorry! Error Occur.</small>";
		}
	}
	
$sql = "";		
$conn->close();
?>
</body>
</html>