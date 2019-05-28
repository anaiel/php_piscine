<?php

function my_hash ($clear_pw) {
	$hash = $clear_pw;
	$i = 0;
	while ($i < 1000)
	{
		$hash = hash('whirlpool', "wedabest".$hash);
		$i++;
	}
	return $hash;
}

?>