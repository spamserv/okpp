<?php

if(isset($_POST['arg1']) && isset($_POST['arg2'])) {
	$arg1 = $_POST['arg1'];
	$arg2 = $_POST['arg2'];
}

$arg1 = json_encode($arg1);
$arg2 = json_encode($arg2);
$cmd = "start engine.bat {$arg1} {$arg2}";
exec($cmd);