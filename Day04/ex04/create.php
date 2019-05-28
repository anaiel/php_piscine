<?php

$folder = "../private/";
$passwd_file = $folder."passwd";

if ($_POST['submit'] != "OK")
{
	echo "ERROR\n";
	exit ;
}

if (!file_exists($passwd_file))
{
	mkdir($folder);
	$usr_list = array();
}
else
	$usr_list = unserialize(file_get_contents($passwd_file));

foreach ($usr_list as $existing_usr)
{
	if ($_POST['login'] == $existing_usr['login'])
	{
		echo "ERROR\n";
		exit ;
	}
}

$passwd = $_POST['passwd'];
$i = 0;
while ($i < 1000)
{
	$passwd = hash('whirlpool', "thisissupposedtomakeitharder".$passwd);
	$i++;
}

$usr_list[] = array(
	"login" => $_POST['login'],
	"passwd" => $passwd);

file_put_contents($passwd_file, serialize($usr_list));

echo "OK\n";
header("Location: index.html");

?>