#!/usr/bin/php
<?php

$fd = fopen("/var/run/utmpx", "r");
if ($fd === false)
	exit ();
fread($fd, 628);
$first = true;
date_default_timezone_set("Europe/Paris");
while ($record = fread($fd, 628))
{
	$unpack = unpack("a256username/it_id/a32t_name/ipid/slog_type/sukwn/itmpstp/ims/a256hostname/a64unknwn", $record);
	if ($first)
		$first = false;
	else
	{
		$unpack["username"] = preg_replace('/[^\x20-\x7E]/', '', $unpack["username"]);
		$unpack["t_name"] = preg_replace('/[^\x20-\x7E]/', '', $unpack["t_name"]);
		echo $unpack["username"]." ".$unpack["t_name"]."  ".date('F d H:i', $unpack["tmpstp"])." \n";
	}
}
fclose($fd);
?>