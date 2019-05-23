#!/usr/bin/php
<?php

if ($argc < 2)
	exit ();

$file = file_get_contents($argv[1]);

$file = preg_replace_callback(
	"/(<a[^>]*)(>.*?<)(\/a>)/si",
	function ($link){
			// Uppercase for title within <a> tag
			$link[1] = preg_replace_callback(
				'/(title=")(.*?)(")/si',
				function ($title_link){
						return $title_link[1].strtoupper($title_link[2]).$title_link[3];
					},
				$link[1]
			);
			// Uppercase for content of link
			$link[2] = preg_replace_callback(
				'/>[^<]*?</si',
				function ($content){
						return strtoupper($content[0]);
					},
				$link[2]);
			// Uppercase for titles in tags between <a></a>
			$link[2] = preg_replace_callback(
				'/(<[^>]*?title=")(.*?)(")/si',
				function ($title_embed){
						return $title_embed[1].strtoupper($title_embed[2]).$title_embed[3];
					},
				$link[2]);
			return $link[1].$link[2].$link[3];
		},
	$file);
echo $file;

?>