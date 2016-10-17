<?php 

	$isLive = false;
	
	//Connection string
	//postgres://fidxdwwuzfakev:Ns82YFJNUqjW18MsIZQ0q_h2Xr@ec2-23-21-193-140.compute-1.amazonaws.com:5432/dao4rrqa6npjal

	//Database credentials

	$dbuser = ($isLive) ? "fidxdwwuzfakev" : "postgres";
	$dbpass = ($isLive) ? "Ns82YFJNUqjW18MsIZQ0q_h2Xr" : "admin";
	$dbhost = ($isLive) ? "ec2-23-21-193-140.compute-1.amazonaws.com" : "localhost";
	$dbport = ($isLive) ? "5432" : "5432";
	$dbname = ($isLive) ? "dao4rrqa6npjal" : "okpp";
	

	//Backup and dump path
	$backup_path = "C:/xampp/htdocs/okpp/backup";
	$pg_dump_path = "C:/xampp/pgsql/9.5/bin/pg_dump.exe";
	$engine_path = "C:/xampp/htdocs/okpp/scripts/engine.bat";

	//Constants
	$check_time = 1;
	$delete_time = 86400;