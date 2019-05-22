#!/usr/bin/php
<?php

if ($argc < 2)
	exit ();

$data = array();
fgets(STDIN);
while (!feof(STDIN))
{
	$tmp = explode(";", fgets(STDIN));
	if (count($tmp) == 4)
		$data[] = array("User" => $tmp[0], "Note" => $tmp[1], "Noteur" => $tmp[2], "Feedback" => $tmp[3]);
	unset($tmp);
}

if ($argv[1] == "moyenne")
{
	$total = 0;
	$nb_noteurs = 0;
	foreach ($data as $eval)
	{
		if ($eval["Noteur"] != "moulinette" && strlen($eval["Note"]))
		{
			$nb_noteurs++;
			$total += $eval["Note"];
		}
	}
	if ($nb_noteurs)
		echo ($total / $nb_noteurs)."\n";
}

else if ($argv[1] == "moyenne_user" || $argv[1] == "ecart_moulinette")
{
	$data_per_user = array();
	foreach ($data as $eval)
	{
		if (!array_key_exists($eval["User"], $data_per_user) && strlen($eval["Note"]))
		{
			if ($eval["Noteur"] != moulinette)
				$data_per_user[$eval["User"]] = array("total" => $eval["Note"], "nb_noteurs" => 1, "moulinette" => "");
			else
				$data_per_user[$eval["User"]] = array("total" => 0, "nb_noteurs" => 0, moulinette => $eval["Note"]);
		}
		else if (strlen($eval["Note"]))
		{
			if ($eval["Noteur"] != "moulinette")
			{
				$data_per_user[$eval["User"]]["total"] += $eval["Note"];
				$data_per_user[$eval["User"]]["nb_noteurs"]++;
			}
			else if (strlen($data_per_user[$eval["User"]]["moulinette"]) == 0)
				$data_per_user[$eval["User"]]["moulinette"] = $eval["Note"];
		}
	}
	ksort($data_per_user);
	foreach ($data_per_user as $key=>$user)
	{
		if ($user["nb_noteurs"])
		{
			if ($argv[1] == "moyenne_user")
				echo $key.":".($user["total"] / $user["nb_noteurs"])."\n";
			else if ($argv[1] == "ecart_moulinette")
				echo $key.":".($user["total"] / $user["nb_noteurs"] - $user["moulinette"])."\n";
		}
	}
}

?>