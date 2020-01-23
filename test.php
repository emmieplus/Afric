<!DOCtype html>
<html>
	<head>
		<!-- Custom Javascript Library -->
		<script src="library/js/instant.js"></script>
	</head>
	<script>
	var r = confirm("Press a button");
if (r == true) {
    alert("You pressed OK!");
} else {
    alert("You pressed Cancel!");
}
	alert("<?php if (isset($_POST['outPutter'])) echo $_POST['outPutter']; ?>");
	</script>
	<body onload="document.getElementById('submit2').click();">
		
<p id="demo">Click the button to get your position.</p>

<button onclick="getLocation()">Try It</button>

<div id="mapholder"></div>
<form name="qr" role="form" method="post" method="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

				<div class="form-group" id="reciever">
                    <label for="exampleInputEmail1"><?php echo $expert; ?>Email address</label>
                    <input name="outPutter" type="text" class="form-control" id="outPutter" placeholder="Enter email" value="anything">
                </div>
  <div class="card-footer">
                  <button name="submit2" id="submit2" type="submit" class="btn btn-primary">Give Access</button>
                </div>
  </form>
<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    var latlon = position.coords.latitude + "," + position.coords.longitude;

    var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="
    +latlon+"&zoom=14&size=400x300&sensor=false";
    document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}
</script>

	</body>
</html>