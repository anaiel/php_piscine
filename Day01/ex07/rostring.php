#!/usr/bin/php
<?php

$list = explode(" ", $argv[1]);
$list = array_filter($list, 'strlen');
$list = array_values($list);
if (count($list))
{
	$first_elem = $list[0];
	$i = 0;
	while ($i < count($list) - 1)
	{
		$list[$i] = $list[$i + 1];
		$i++;
	}
	$list[$i] = $first_elem;
	$first = true;
	foreach ($list as $elem)
	{
		if ($first)
			$first = false;
		else
			echo " ";
		echo "$elem";
	}
	echo "\n";
}

?>