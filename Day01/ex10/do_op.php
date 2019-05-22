#!/usr/bin/php
<?php

if ($argc - 1 != 3)
{
	echo "Incorrect Parameters\n";
	exit ();
}
$nb1 = trim($argv[1]);
$op = trim($argv[2]);
$nb2 = trim($argv[3]);
switch($op)
{
	case "*":
		print(($nb1 * $nb2)."\n");
		break;
	case "/":
		print(($nb1 / $nb2)."\n");
		break;
	case "+":
		print(($nb1 + $nb2)."\n");
		break;
	case "-":
		print(($nb1 - $nb2)."\n");
		break;
	case "%":
		print(($nb1 % $nb2)."\n");
		break;
}

?>