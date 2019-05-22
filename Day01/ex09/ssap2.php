#!/usr/bin/php
<?php

$list = array ();
$first_elem = true;
foreach ($argv as $arg)
{
	if ($first_elem)
		$first_elem = false;
	else
		$list = array_merge($list, array_filter(explode(" ", $arg), "strlen"));
}
$char = $num = $spec = array();
foreach ($list as $elem)
{
	if (is_numeric($elem[0]))
		$num[] = $elem;
	else if (($elem[0] >= 'a' && $elem[0] <= 'z') || ($elem[0] >= 'A' && $elem[0] <= 'Z'))
		$char[] = $elem;
	else
		$spec[] = $elem;
}
sort($num);
sort($spec);
natcasesort($char);
$final = array_merge($char, array_merge($num, $spec));
foreach ($final as $elem)
	echo "$elem\n";

?>