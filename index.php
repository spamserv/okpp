<?php 
	
	require('config/config.php');
	require('config/database.php');

	/* Primjer prvog argumenta (vrsta backupa)
		
		Za pun backup : "{'backup_type':'F'}"
		Za selektivan backup : "{'backup_type':'S','tables':['first_table', 'second_table']}"
	*/

	/* Primjer drugog argumenta (pokretanje backupa)
		
		Za pokretanje na vrijeme : "{'backup_start':'T', 'time_interval': 10}" - parametar time interval predaje se broj sekundi
		Za pokretanje na promjenu : "{'backup_start':'C','tables':['first_table', 'second_table'],'delete':'true'}" - tables je lista tablica, a delete može biti true ili false
	*/

	/* Primjer pokretanja bat skripte za početak rada swaga 
		- ovo bi se moglo prebacit u neku drugu skriptu i onda pozivat sa ajax
		*/
		/*
		$arg1 = "{'backup_type':'F'}";
		$arg2 = "{'backup_start':'T', 'time_interval': 10}";

		$cmd = "start {$engine_path} \"{$arg1}\" \"{$arg2}\"";
		exec($cmd);
		*/
	/**/

?>

<!DOCTYPE html>
<html>
<head>
	<title>ASSKBP</title>
	<link rel="shortcut icon" href="favicon.ico">
	<meta charset="utf-8">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="js/jquery.sumoselect.min.js"></script>
	<link href="css/sumoselect.css" rel="stylesheet" />
</head>
<body>
<div class="center">
	<div class="container">
		<h1>
		Euphoria DEVS v3.0
		</h1>
		<div class="row">
			<div class="col-md-4">
			Backup type:<br>
				<select name="database-type" class="backup-type">
					<option value="F">Full backup</option>
					<option value="S">Selective backup</option>
				</select>
			</div>

			<div class="col-md-4 div-db-tables" style="display:none;">
			List of tables to backup: <br>			
			<select size="5" multiple="multiple" class="db-tables">
				<?php 
					$res = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE';");
					while ($row = pg_fetch_row($res)) {
						echo "<option selected>".$row[0]."</option>";;
					}
				?>
			</select>
			</div>
		</div>

		<div class="row">

			<div class="col-md-4 div-backup-start">
			Trigger type:<br>
				<select name="database-type" class="backup-start">
					<option value="T">Time triggered</option>
					<option value="C">Event triggered</option>
				</select>
			</div>

			<div class="col-md-4 div-backup-time">
			Backup frequency:<br>
				<select name="database-type" class="backup-time">
					<option value="1">1 second</option>
					<option value="5">5 seconds</option>
					<option value="30">30 seconds</option>
					<option value="60">1 minute</option>
					<option value="300">5 minutes</option>
					<option value="1800">30 minutes</option>
					<option value="3600">1 hour</option>
					<option value="43200">12 hours</option>
					<option value="86400">1 day</option>
					<option value="604800">1 week</option>
				</select>
			</div>

			<div class="col-md-4 div-backup-tables" style="display:none;">
			Table on which event is triggered: <br>			
			<select size="5" multiple="multiple" class="backup-tables">
				<?php 
					$res = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE';");
					while ($row = pg_fetch_row($res)) {
						echo "<option selected>".$row[0]."</option>";;
					}
				?>
			</select>
			</div>


		</div>

		<div class="row">
			<div class="col-md-4 div-checkbox" style="display:none;">
				<label class="checkbox-inline delete-text"><input type="checkbox" class="delete">Delete?</label>
			</div>
		</div>

		<div class="row">
		<br>
			<div class="col-md-6">
				<a href="#" class="btn btn-default btn-save-changes"><span class="glyphicon glyphicon-floppy-disk"></span> Save changes</a>
			</div>
		</div>
	</div>
<script type="text/javascript" src="js/index.js"></script>
</body>
</html>