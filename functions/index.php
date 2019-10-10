<?php

function logToFile($user, $action) {

	$time = date('d.m.Y H:i:s', time());
	if($user->name() != "") {
		$user = $user->name();
	}
	else {
		$user = $user->email();
	}

	$log = $time . " — " . $user . " " . $action . "\n";

	file_put_contents(kirby()->root('config') . "/log.txt", $log, FILE_APPEND);

}