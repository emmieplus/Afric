<!DOCTYPE html>
<html lang="en">
	<head>
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
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="asset/css/materialize.min.css">
		<link rel="stylesheet" href="asset/css/ghpages-materialize.css">
		<link rel="stylesheet" href="asset/css/prism.css">
		<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<!-- jQuery library -->
		<script src="asset/jquery/jquery.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="asset/js/materialize.min.js"></script>
		<script src="asset/bootstrap/js/bootstrap.min.js"></script>
		
		<!-- Custom Javascript Library -->
		<script src="library/js/instant.js"></script>
		
		<!-- Other Header -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Health Afric</title>
	</head>
	<body>
		<div class="container">
			<div>
				<h3>Health Afric<div class="fixed-action-btn">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">menu</i>
  </a>
  <ul>
    <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
    <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
    <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
    <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
  </ul>
</div>
 </h3>
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
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Menu</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.html">Home</a></li>
						<li><a href="mission-and-vision.html">Mission and Vision</a></li>
						<li><a href="team.html">Teams</a></li>
						<li><a href="partners.html">Partners</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="progress">
			<div class="indeterminate"></div>
		</div>
		<div align="center" class="container">
				<h3>Unified Health Board</h3>
				<p>We create a single connection of individual patients, health personnel and approved centres.</p>
				<div class="form-group">
					<form method="post" action="search.php">
						  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">search</i>
          <input id="icon_prefix" type="text" class="validate" name="search_query">
          <label for="icon_prefix">Search Centers</label>
        </div>
      </div>
    </form>
  </div>
        
					</form>
				</div>	
			<!--/div-->
			<!--div class="divider" id="search_result">
			</div-->
		</div>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col s12 m3 l3 light-blue">
					<div class="card">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" height="200px" src="images/ambulance.gif">
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">Emergency Services<i class="material-icons right">more_vert</i></span>
							<p>We create a smart emergency support system</p>
						</div>
						<div class="card-reveal">		
							<span class="card-title grey-text text-darken-4">Emergency Services<i class="material-icons right">close</i></span>
							<p>We create a smart emergency support system that is able to span web of Emergency signal across all accredited Health Centres within the Metropolis, solving problem of Health insurgence and Health related issues that needs Emergency Unit attention.</p>
						</div>
					</div>
				</div>
				<div class="col s12 m3 l3 light-blue">
					<div class="card">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" height="200px" src="images/consult.jpg">
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">Consult a Personnel<i class="material-icons right">more_vert</i></span>
							<p>This system allow you to consult health expert</p>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Consult a Personnel<i class="material-icons right">close</i></span>
							<p>This system allow you to consult health experts in various fields in medicine and other health related sphere. In doing so, we have designed a two way communication aided platform to link patient and experts, to discuss health issues </p>
						</div>
					</div>
				</div>
				<div class="col s12 m3 l3 light-blue">
					<div class="card">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" height="200px" src="images/insurance.jpg">
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">Health Insurance<i class="material-icons right">more_vert</i></span>
							<p>With our quality health insurance policy, we</p>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Health Insurance<i class="material-icons right">close</i></span>
							<p>With our quality health insurance policy, we ensure your access to quality health service, anywhere in the world, partnering with <B>WHO</B> to ensure that quality healthcare is at your disposal</p>
						</div>
					</div>
				</div>
				<div class="col s12 m3 l3 light-blue">
					<div class="card">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" height="200px" src="images/privacy.png">
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">Privacy Protection<i class="material-icons right">more_vert</i></span>
							<p>In giving you the best health experience</p>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Privacy Protection<i class="material-icons right">close</i></span>
							<p>In giving you the best health experience, our expertise in health solution using digital technologies, we provide an excellent health solution putting your data privacy as a priority</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container background" style="background-color:grey">
			
		</div>
		
		<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">UHR</h5>
                <p class="grey-text text-lighten-4">This is one way window to the world of Telemedicine in NIgeria. We are dedicated connecting patients, Hospitals, clinics, Medical Products, Pharmacies and Investors together in one System. We improve Medical Professionalism and Practice, and make your Data Security our Priority</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Insight</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Home</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Mission</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Vision</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Faq</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2019 Copyright UHR
            <a class="grey-text text-lighten-4 right" href="#!">Uhr.org</a>
            </div>
          </div>
        </footer>
	</body>
</html>
