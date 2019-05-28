<?php

if ($_SERVER['PHP_AUTH_USER'] == 'zaz' && $_SERVER['PHP_AUTH_PW'] == 'jaimelespetitsponeys')
{
	$img = "data:image/png;base64,".base64_encode(file_get_contents("../img/42.png"));
	echo "<html><body>\nBonjour ".$_SERVER['PHP_AUTH_USER']."<br />\n<img src='".$img."'>\n</body></html>\n";
}
else
{
	header("WWW-Authenticate: Basic realm=''Espace membres''");
	header('HTTP/1.0 401 Unauthorized');
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
}

?>