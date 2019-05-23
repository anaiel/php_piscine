#!/usr/bin/php
<?php

/* ***************** TOOLS ***************** */

function	is_leap_year($year)
{
	if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0)
		return true;
	return false;
}

$months = array("/[Jj]anvier/", "/[Ff]evrier/", "/[Mm]ars/", "/[Aa]vril/", "/[Mm]ai/", "/[Jj]uin/", "/[Jj]uillet/", "/[Aa]out/", "/[Ss]eptembre/", "/[Oo]ctobre/", "/[Nn]ovembre/", "/[Dd]ecembre/");
$regexp = "/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) ((([0][1-9]|[12]?[0-9]|3[01]) ([Jj]anvier|[Mm]ars|[Mm]ai|[Jj]uillet|[Aa]out|[Oo]ctobre|[Dd]ecembre)|([0][1-9]|[12]{0,1}[0-9]|30) ([Aa]vril|[Jj]uin|[Ss]eptembre|[Nn]ovembre)|([0][1-9]|[12]{0,1}[0-9]) [Ff]evrier)) ([0-9]{4}) ([01][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/";

/* **************** PROGRAM **************** */
if ($argc < 2)
	exit ();

if (preg_match($regexp, $argv[1]))
{
	$date = explode(" ", $argv[1]);
	$time = explode(":", $date[4]);

	foreach($months as $key=>$month)
	{
		if (preg_match($month, $date[2]))
		{
			$month_nb = $key + 1;
			break;
		}
	}

	// Checks that the given year is a leap year if the date is February 29th
	if ($date[1] == 29 && $month_nb == 2 && !is_leap_year($date[3]))
	{
		echo "Wrong Format\n";
		exit ();
	}

	date_default_timezone_set("Europe/Paris");
	$seconds = mktime($time[0], $time[1], $time[2], $month_nb, $date[1], $date[3]);
	echo $seconds."\n";
}
else
{
	echo "Wrong Format\n";
}

?>