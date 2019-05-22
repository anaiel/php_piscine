#!/usr/bin/php
<?php

$hash = array();
$i = $argc - 1;
while ($i > 1)
{
	$tmp = explode(":", $argv[$i]);
	$hash[$tmp[0]] = $tmp[1];
	unset($tmp);
	$i--;
}
$res = $hash[$argv[1]];
if ($res)
	echo $res."\n";
?>