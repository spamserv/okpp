<?php
	
	require('../config/config.php');
	require("../config/database.php");

	function println($data) {
		print($data."\n");
	}

	function start_backup($backup_type, $backup_start, $backup_delete, $backup_tables) {
		$cmd = "php backup.php {$backup_type} {$backup_start} {$backup_delete} ";

		if(count($backup_tables) > 0)
			$cmd .= implode(",", $backup_tables);

		println("Backup started..");

		println(exec($cmd));
	}

	println("                                 
			    _    ____ ____  _  ______  ____  
			   / \  / ___/ ___|| |/ / __ )|  _ \ 	Kristijan Birtic
			  / _ \ \___ \___ \| ' /|  _ \| |_) |	Kristijan Simenic
			 / ___ \ ___) |__) | . \| |_) |  __/ 	Josip Turjak
			/_/   \_\____/____/|_|\_\____/|_|	Josip Vojak

			");

	$arg1 = $argv[1];
	$arg2 = $argv[2];

	$arg1 = str_replace("'", "\"", $arg1);
	$arg2 = str_replace("'", "\"", $arg2);

	$arg1 = json_decode($arg1);
	$arg2 = json_decode($arg2);

	/* Define backup types and tables */
	$backup_type = $arg1->backup_type;
	$backup_tables = ($backup_type == "S") ? $arg1->tables : [];

	/* Define backup start and time interval, backup tables and delete backup option */
	$backup_start = $arg2->backup_start;
	$backup_interval = ($backup_start == "T") ? $arg2->time_interval : 0;
	$tables = ($backup_start == "C") ? $arg2->tables : [];
	$backup_delete = ($backup_start == "C") ? $arg2->delete : "false";

	/* Logic */
	if($backup_start == "T") {
		$start_time = time();
		while (true) {
			$current_time = time();
			$left_to_backup = $backup_interval-($current_time-$start_time);
			if($left_to_backup < 0) {
				$backup_interval = $backup_interval + ($left_to_backup*-1);
				println("Minimum time between backups increased to: ".$backup_interval);
				$left_to_backup = 0;
			}
			println("Backing up in: ".$left_to_backup);
			if($left_to_backup <= 0){
				start_backup($backup_type, $backup_start, $backup_delete, $backup_tables);
				$start_time = $current_time;
			}
			sleep($check_time);
		}
	}

	if($backup_start == "C") {
		while (true) {

			$timestamp = date("Y-m-d H:i:s", time() - $check_time);
			println($timestamp);
			$query = "SELECT * FROM audit.logged_actions WHERE action_tstamp > '$timestamp'";

			if(count($tables) > 0) {
				$query .= " AND table_name IN(";
				foreach ($tables as $table) {
					$query .= "'".$table."',";
				}
				$query = trim($query, ",");
				$query .= ")";
			}

			$result = pg_query($conn, $query);

			if(pg_num_rows($result)) {
				start_backup($backup_type, $backup_start, $backup_delete, $backup_tables);
			}

			sleep($check_time);
		}
	}