<?php

function    ft_is_sort($array)
{
	$sorted = $array;
	sort($sorted);
	foreach($array as $i=>$val)
		if ($val != $sorted[$i])
			return (false);
	return (true);
}

?>