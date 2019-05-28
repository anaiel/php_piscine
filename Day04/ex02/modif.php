<?php

/* ************ TOOLS ************ */
$folder = "../private/";
$passwd_file = $folder."passwd";

function my_hash ($clear_pw) {
	$hash = $clear_pw;
	$i = 0;
	while ($i < 1000)
	{
		$hash = hash('whirlpool', "thisissupposedtomakeitharder".$hash);
		$i++;
	}
	return $hash;
}

function get_usr_index ($usr_name, $usr_list) {
	foreach ($usr_list as $key=>$usr) {
		if ($usr_name == $usr['login'])
			return $key;
	}
	return -1;
}

/* ************ MAIN ************* */
if ($_POST['submit'] != "OK" || $_POST['newpw'] == "")
{
	echo "ERROR\n";
	exit ;
}

$usr_list = unserialize(file_get_contents($passwd_file));

$usr_index = get_usr_index($_POST['login'], $usr_list);
if ($usr_index == -1) {
	echo "ERROR\n";
	exit ;
}

$oldpw = my_hash($_POST['oldpw']);
if ($oldpw != $usr_list[$usr_index]['passwd']) {
	echo "ERROR\n";
	exit ;
}

$newpw = my_hash($_POST['newpw']);
if ($newpw == $usr_list[$usr_index]['passwd']) {
	echo "ERROR\n";
	exit ;
}
$usr_list[$usr_index]['passwd']= $newpw;

file_put_contents($passwd_file, serialize($usr_list));

echo "OK\n";

?>