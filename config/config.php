<?php 
	
	//Connection string
	//postgres://fidxdwwuzfakev:Ns82YFJNUqjW18MsIZQ0q_h2Xr@ec2-23-21-193-140.compute-1.amazonaws.com:5432/dao4rrqa6npjal

	//Database credentials
	$dbuser = "fidxdwwuzfakev";
	$dbpass = "Ns82YFJNUqjW18MsIZQ0q_h2Xr";
	$dbhost = "ec2-23-21-193-140.compute-1.amazonaws.com";
	$dbport = "5432";
	$dbname = "dao4rrqa6npjal";

	//Backup and dump path
	$backup_path = "C:/xampp/htdocs/okpp/backup";
	$pg_dump_path = "C:/xampp/pgsql/9.5/bin/pg_dump.exe";
	$engine_path = "C:/xampp/htdocs/okpp/scripts/engine.bat";

	//Constants
	$check_time = 1;
	$delete_time = 86400;