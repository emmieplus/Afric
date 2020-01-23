<?php
//connection
include("include/database.php");
include("include/indexer.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="asset/jquery/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="asset/bootstrap/js/bootstrap.min.js"></script>
		<!-- Custom Javascript Library -->
		<script src="library/js/instant.js"></script>
		<script src="library/js/instantjquery.js"></script>
		<!-- Other Header -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="container">
			<div>
				<h1>Health Ring<button id="quick" class="btn btn-info" style="float:right; border-radius:50%">+</button></h1>
				<p>The Universe health Community.</p>
			</div>
		</div>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Menu</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="mission-and-vision.html">Mission and Vision</a></li>
						<li><a href="#">Teams</a></li>
						<li><a href="#">Sponsors</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<hr>
		<div align="center" class="container">
			<!--img class="img-responsive" src="images/Desert.jpg" alt="HealthRing wallpaper"-->
			<!--div class="carousel-caption"-->
				<h3>Unified Health Board</h3>
				<p>We create a single connection of individual patients, health personnel and approved centres.</p>
				<div class="form-group">
					<form method="post" action="search.php">
						<!--label for="search">Search Center:</label-->
						<input type="text" class="form-control" id="search" name="search_query" value="<?php if (isset($_POST['search_query'])){echo $_POST['search_query'];} else { echo "";} ?>" />
						<input type="submit" value="Search any Center"/>
					</form>
				</div>	
		</div>
		<div class="container" id="search_result">
			
<?php
//search code
if((isset($_POST['search_query'])))
{
	
	//include("config.php"); //database config file
	//echo $_POST['search_query']."<br>";
	$query = $_POST['search_query'];
	//seperating words and appending the metaphones
	//each words with space
	$search = explode(" ",$query);
	$search_string="";
	foreach($search as $word)
	{
		$search_string.=metaphone($word)." ";
	}
	//echo $search_string."<br>";
	$sql = "SELECT * FROM center WHERE indexing LIKE '%$search_string%'";
	$res = mysqli_query($conn, $sql);
	if(!$res)
	{
		echo mysqli_error($conn);
	}
	
	//first output selection for map
	$mapping = 0;
	//display search result time
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			if ($mapping < 1)
			{
				?>
				<!--first row output-->
				<div class="row">
					<div class="col-sm-8 col-xs-8">
						<h4><?php echo $row['center_name']; ?></h4>
						<p><?php echo $row['center_desc']; ?></p>
					</div>
					<div class="col-sm-4 col-xs-4" style="padding-top:20px">
						<input type="hidden" value="<?php echo $row['center_lat']; ?>" />
						<input type="hidden" value="<?php echo $row['center_lon']; ?>" />
						<!-- below button is expected to hold image that pop-up center location with relation to your current location-->
						<button class="btn btn-lg" data-toggle="modal" data-target="#myModal"><img src="images/wait64x64.gif" class="img-responsive" /></button>
						
					</div>
				</div>
				
				<!-- Modal -->
				<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
					
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">View Location</h4>
							</div>
							<div class="modal-body">
								<div id="mapholder"></div>
								<p id="map"><?php echo $row['center_desc']; ?></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			else
			{
				?>
				<!--Other row output-->
				<div class="row">
				<div class="col-sm-8 col-xs-12">
					<h4><?php echo $row['center_name']; ?></h4>
					<p><?php echo $row['center_desc']; ?></p>
				</div>
				<div class="col-sm-4 col-xs-0">
					<input type="hidden" value="<?php echo $row['center_lat']; ?>" />
					<input type="hidden" value="<?php echo $row['center_lon']; ?>" />
				</div>
				</div>
				<?php
			}
			$mapping =+ 1;
		}
	}
}
?>
			</div>
		</div>
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
		<div id="floater" z-index="1" style="position:absolute; top: 80px;
    right: 0;
    width: 200px;
    height: 100px;
    border: 3px solid #73AD21;">
			<div id="">
				<button style="border-radius:50%; float:right" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal"><img src="images/wait64x64.gif" class="img-responsive" /></button>
			</div>
			<div id="">
				<button style="border-radius:50%; float:right" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal"><img src="images/wait64x64.gif" class="img-responsive" /></button>
			</div>
			<div id="">
				<button style="border-radius:50%; float:right" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal"><img src="images/wait64x64.gif" class="img-responsive" /></button>
			</div>
		</div>
		<script>
			
		</script>
	</body>
</html>