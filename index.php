<!DOCTYPE html>
<html>
	<head>
		<title>Analog Time Clock Demo</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/mdtimepicker.min.css">
		<link rel="stylesheet" href="css/style.css">
		
	</head>
	<body>
		<header class="page-header jumbotron">
			<h1>Analog Alarm Clock</h1>
			<div id="site-tag" class="h5">Demo by Steven Lujan</div>
		</header>
		<div id="content" class="container-fluid">
			<h2>Demo by Steven Lujan</h2>
			<div class="row">
				<div id="clock-container" class="col-sm-12 col-md-6">
					<div id="myclock" class="metal radial"></div>
					<div id="time-zone" class="text-center h4 mt-3"></div>
					<button id="stop-alarm" class="btn btn-lg btn-danger">STOP ALARM</button>
				</div>
				<div id="settings-container" class="col-sm-12 col-md-4">
					<div id="alarm-settings">
						<div class="section-title text-center"><h3>Alarm</h3></div>
						<div class="row">
							<div class="col-sm-3">
								<div class="w-100 h5">ON/OFF</div>
								<label class="switch">
									<input id="alarm-toggle" name="alarm-toggle" type="checkbox" class="form-control" value="true"<?php if($alarmOn == true) echo "checked"; ?>>
									<span class="slider"></span>
								</label>
							</div>
							<div class="col-sm-9">
								<div class="w-100 h5">SET TIME</div>
								<input type="text" name="timepicker" id="timepicker" class="form-control" placeholder="Click to Choose..." <?php if($timepicker !== '') echo ('value="'.$timepicker.'"'); ?>>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="container-fluid fixed-footer text-center">
			<div class="mt-3">&copy; <?php echo date("Y"); ?></div>
		</footer>
		<!-- JS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.thooClock.js"></script>
		<script language="javascript" type="text/javascript" src="js/mdtimepicker.min.js"></script>
		<script language="javascript" type="text/javascript" src="js/clock.js.php"></script>
	</body>
</html>