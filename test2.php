<?php
include('include/database.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
$itsdone = "";
$checker = "";
$expert = "";
if (isset($_POST['submit']))
{
	$checker = $_POST['addingoption'];
	$expert = $_POST['expert'];
	/*$sql = "SELECT * FROM users WHERE email='$username'";*/
}
if (isset($_POST['outPutter'])) 
{
	$expert = $_POST['outPutter'];
	/*$sql = "SELECT * FROM users WHERE email='$username'";*/
}
$expert = $_POST['outPutter'];
?>
<!DOCTYPE html>
	
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

	<head>
	
	<script src="asset/jsQR/jsQR.js"></script>
	<style>
 

    h1 {
      margin: 10px 0;
      font-size: 40px;
    }

    #loadingMessage {
      text-align: center;
      padding: 40px;
      background-color: #eee;
    }

    #canvas {
      width: 100%;
    }

    #output {
      margin-top: 20px;
      background: #eee;
      padding: 10px;
      padding-bottom: 0;
    }

    #output div {
      padding-bottom: 10px;
      word-wrap: break-word;
    }

    #noQRFound {
      text-align: center;
    }
  </style>
	
</head>
<body class="hold-transition sidebar-mini">
<!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
				  <form name="qr" role="form" method="post" method="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				  <div id="loadingMessage">Unable to access video stream (please make sure you have a webcam enabled)</div>
  <canvas id="canvas" hidden></canvas>
  <div id="output" hidden>
    <div id="outputMessage">No QR code detected.</div>
    <div hidden><b>Data:</b> <span id="outputData"></span></div>
  </div>
				<div class="form-group" id="reciever">
                    <label for="exampleInputEmail1"><?php echo $expert; ?>Email address</label>
                    <input name="outPutter" type="text" class="form-control" id="outPutter" placeholder="Enter email" value="">
                </div>
  <div class="card-footer">
                  <button name="submit2" id="submit2" type="submit" class="btn btn-primary">Give Access</button>
                </div>
  </form>
                  </div>
                  <!-- /.tab-pane -->

<!-- REQUIRED SCRIPTS -->
<!-- QRcode -->
<script>
    var video = document.createElement("video");
    var canvasElement = document.getElementById("canvas");
    var canvas = canvasElement.getContext("2d");
    var loadingMessage = document.getElementById("loadingMessage");
    var outputContainer = document.getElementById("output");
    var outputMessage = document.getElementById("outputMessage");
    var outputData = document.getElementById("outputData");
	var outPutter  = document.getElementById("outPutter");

    function drawLine(begin, end, color) {
      canvas.beginPath();
      canvas.moveTo(begin.x, begin.y);
      canvas.lineTo(end.x, end.y);
      canvas.lineWidth = 4;
      canvas.strokeStyle = color;
      canvas.stroke();
    }

    // Use facingMode: environment to attemt to get the front camera on phones
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
      video.srcObject = stream;
      video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
      video.play();
      requestAnimationFrame(tick);
    });

    function tick() {
      loadingMessage.innerText = "âŒ› Loading video..."
      if (video.readyState === video.HAVE_ENOUGH_DATA) {
        loadingMessage.hidden = true;
        canvasElement.hidden = false;
        outputContainer.hidden = false;

        canvasElement.height = video.videoHeight;
        canvasElement.width = video.videoWidth;
        canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
        var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
        var code = jsQR(imageData.data, imageData.width, imageData.height, {
          inversionAttempts: "dontInvert",
        });
        if (code) {
          drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
          drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
          drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
          drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
          outputMessage.hidden = true;
          outputData.parentElement.hidden = false;
          outputData.innerText = code.data;
		  outPutter.value = code.data;
		  outPutter.disabled = true;
		  alert("done");
		  //document.forms["qr"].submit();
		  document.getElementById('submit2').click();
        } else {
          outputMessage.hidden = false;
          outputData.parentElement.hidden = true;
        }
      }
      requestAnimationFrame(tick);
    }
  </script>