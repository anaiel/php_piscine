<?php

function    ft_split($str)
{
	$split = explode(" ", $str);
	$split = array_filter($split, "strlen");
	sort($split);
	return $split;
}

?>