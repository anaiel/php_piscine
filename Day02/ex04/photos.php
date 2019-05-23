#!/usr/bin/php
<?php

if ($argc < 2)
	exit ();

// Clean site name (keep only main site: remove http and extra path)
$site_name = $argv[1];
$site_name = preg_replace('/^https?:\/\//i', '', $site_name);
$site_name = preg_replace('/\/.*$/', '', $site_name);

// Initialize curl session and get content
$site = curl_init($argv[1]);
if ($site === false)
{
	echo "error: couldn't initiate session with '$site'\n";
	exit();
}
curl_setopt($site, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($site);
if ($content === false)
{
	echo "error: couldn't execute curl\n";
	exit ();
}	

preg_replace_callback
(
	'/<img[^>]*src=(.*?)(>| [^>]*>)/i',
	function ($matches)
		{
			global $site_name, $argv;

			// Clean input information (url and img name)
			$matches[1] = preg_replace('/(^"|"$)/', '', $matches[1]);
			$img_name = preg_replace_callback('/.*\/([^\/]*?)$/', function ($matches){return $matches[1];}, $matches[1]);
			$img_name = preg_replace('/\?.*$/', '', $img_name);

			// Create image folder
			if (is_dir($site_name))
				;
			else
				mkdir($site_name);
			
			// Create file
			if (is_file($site_name."/".$img_name))
				return ;
			$img_fd = fopen($site_name."/".$img_name, "w"); // Create image file and open stream
			if ($img_fd === false)
			{
				echo "error: couldn't open '$site_name/$img_name' file\n";
				return ;
			}

			// Add site url to image url in case of relative path
			if (!preg_match('/^https?:\/\//', $matches[1]))
				$matches[1] = $argv[1].$matches[1];

			// Initialize curl session with image url and retrieve content to image file
			$img_url = curl_init($matches[1]);
			if ($img_url === false)
			{
				echo "error: couldn't initiate session with '$img_url'\n";
				return ;
			}
			curl_setopt($img_url, CURLOPT_FILE, $img_fd);
			curl_setopt($img_url, CURLOPT_HEADER, false);
			curl_exec($img_url);
			curl_close($img_url);
			fclose($img_fd);
		},
	$content
);

curl_close($site);
?>