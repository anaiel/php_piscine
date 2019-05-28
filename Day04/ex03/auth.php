<?php

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

/* *********** MAIN ************* */

function auth ($login, $passwd) {
    $folder = "../private/";
    $passwd_file = $folder."passwd";
    $usr_list = unserialize(file_get_contents($passwd_file));
    $passwd = my_hash($passwd);
    foreach ($usr_list as $user) {
        if ($login == $user['login'] && $passwd == $user['passwd']) {
            return true;
        }
    }
    return false;
}

?>