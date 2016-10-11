<?php

	require('../config/config.php');

	/* Get arguments */
	$backup_type = $argv[1];
	$backup_start = $argv[2];
	$backup_delete = $argv[3];
	$backup_tables = isset($argv[4]) ? $argv[4] : "";

	/* Create command to execute dump */
	$time = time();
	$cmd = "{$pg_dump_path} --dbname=postgres://{$dbuser}:{$dbpass}@{$dbhost}:{$dbport}/{$dbname} -n public -f {$backup_path}/{$time}.sql";
	if($backup_tables != "") {
		$backup_tables = explode(",", $backup_tables);
		foreach ($backup_tables as $table) {
			$cmd .= " -t {$table}";
		}
	}

	/* Execute command */
	exec($cmd);

	/* Delete files if needed */
	if($backup_delete == "true") {
		$files = scandir($backup_path);

		foreach ($files as $file) {
			if($file != "." && $file != "..") {
				$created = explode(".", $file)[0];
				if(intval($created) < time()-$delete_time) {
					unlink($backup_path."/".$file);
				}
			}
		}
	}

	echo "Backup done.";