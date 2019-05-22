#!/usr/bin/php
<?php

if ($argc - 1 != 1)
{
	echo "Incorrect Parameters\n";
	exit ();
}

$op = "";
$op_list = array("+", "-", "/", "%", "*");
$nb1 = $nb2 = "";
foreach($op_list as $current_op)
{
	$tmp = explode($current_op, $argv[1]);
	if (count($tmp) == 2)
	{
		if ($nb1)
		{
			echo "Syntax Error\n";
			exit ();
		}
		$nb1 = trim($tmp[0]);
		$nb2 = trim($tmp[1]);
		$op = $current_op;
	}
	unset($tmp);
}
if (!$nb1 || !is_numeric($nb1) || !is_numeric ($nb2))
{
	echo "Syntax Error\n";
	exit ();
}

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