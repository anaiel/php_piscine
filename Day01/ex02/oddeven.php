#!/usr/bin/php
<?php

while (1)
{
	echo "Entrez un nombre: ";
	$number = trim(fgets(STDIN));
	if (is_numeric($number))
	{
		echo "Le chiffre $number est ";
		if ($number % 2 == 0)
			echo "Pair\n";
		else
			echo "Impair\n";
	}
	else
	{
		if (feof(STDIN))
		{
			echo "\n";
			exit();
		}
		else
			echo "'$number' n'est pas un chiffre\n";
	}
}

?>