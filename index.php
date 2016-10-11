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
		$arg1 = "{'backup_type':'F'}";
		$arg2 = "{'backup_start':'T', 'time_interval': 10}";

		$cmd = "start {$engine_path} \"{$arg1}\" \"{$arg2}\"";
		exec($cmd);
	/**/

?>

<!DOCTYPE html>
<html>
<head>
	<title>Najbolja stranica</title>
</head>
<body>
Euphoria DEVS v3.0
<br><br>Popis tablica<br>
<select multiple rows="5">
	<?php 
		$res = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE';");
		while ($row = pg_fetch_row($res)) {
			echo "<option selected>".$row[0]."</option>";;
		}
	?>
</select>
</body>
</html>