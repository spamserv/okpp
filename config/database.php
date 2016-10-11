<?php 

	/* Connect to database */
	$conn = pg_connect("host={$dbhost} port={$dbport} dbname={$dbname} user={$dbuser} password={$dbpass}") or die("Could not connect to database");