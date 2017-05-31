<?php

/*
 * Uses for getting root directory and root url of site
 */

class Root
{
	public static function dir()
	{
		return str_replace("\\","/", __DIR__);
	}
	public static function url()
	{
		$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
		return rtrim($link,"/");
	}
}