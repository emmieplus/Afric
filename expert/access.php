<?php
include('../include/database.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();


//$conn->close();
?>
<html>
<head>
 <script type="text/javascript" src="../asset/qrcodejs/qrcode.js"></script>
</head>
<body>
<center><div style="padding-top:100" id="qrcode"></div></center>
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	text: "localhost/healthring/expert/createaccess.php?id=<?php echo $_SESSION['email']; ?>",
	width: 300,
	height: 300,
	colorDark : "#000000",
	colorLight : "#ffffff",
	correctLevel : QRCode.CorrectLevel.H
});
</script>
</body>
</html>
<?php echo $_SESSION['email']; ?>