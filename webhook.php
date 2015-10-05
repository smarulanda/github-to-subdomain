<?php

$script_path = "/root/webhooks";
$blacklist = array("www", "api");

$payload = json_decode($_POST['payload']);
$headers = apache_request_headers();

$event = $headers['X-github-event'];   // create, push, or delete
$branch = end(explode("/", $payload['ref']));

if ((strlen($branch) > 0) && !in_array($branch, $blacklist)) {
	$cmd = "sudo {$script_path}/branch-{$event}.sh {$branch}";
	echo shell_exec($cmd);
}