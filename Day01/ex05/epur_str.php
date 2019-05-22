#!/usr/bin/php
<?php

if ($argc == 1)
	exit ();

$str = explode(" ", $argv[1]);
$str = array_filter($str, "strlen");
$first_element = true;
foreach ($str as $word)
{
	if ($first_element)
		$first_element = false;
	else
		echo " ";
	echo $word;
}
echo "\n"

?>