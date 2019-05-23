#!/usr/bin/php
<?php

if ($argc < 2)
	exit ();

echo preg_replace("/[ \t]+/", " ", trim($argv[1]))."\n";

?>