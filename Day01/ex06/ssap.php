#!/usr/bin/php
<?php

$list = array();
$first_elem = true;
foreach ($argv as $arg)
{
	if ($first_elem)
		$first_elem = false;
	else
		$list = array_merge($list, array_filter(explode(" ", $arg), "strlen"));
}
sort($list);
foreach ($list as $elem)
	echo "$elem\n";

?>