<?php

/*------------------------------------------------------------------------

1. Reversing an array

------------------------------------------------------------------------*/
$arr = ["h","e","l","l","o"];

/*
 * "for" loop
 */
$method_1 = function ($arr) {
	$arr_rev = [];

	for ($i = count($arr)-1; $i >= 0 ; $i--) {
		$arr_rev[] = $arr[$i];
	}
	return $arr_rev;
};

/*
 * "unshift" fnc
 */
$method_2 = function ($arr) {
	$arr_rev = [];

	for ($i = 0; $i < count($arr) ; $i++) {
		array_unshift($arr_rev, $arr[$i]);
	}
	return $arr_rev;
};

/*
 * "krsort" fnc
 */
$method_3 = function ($arr) {
	$arr_rev = $arr;
	krsort($arr_rev);
	return $arr_rev;
};

echo "<h3>1. Reversing an array</h3>";

echo join(" ", $arr) . " &nbsp; - (initial)" . "<br><br>";
echo join(" ", $method_1($arr)) . " &nbsp; - (\"for\" loop)" . "<br><br>";
echo join(" ", $method_2($arr)) . " &nbsp; - (\"unshift\" function)" . "<br><br>";
echo join(" ", $method_3($arr)) . " &nbsp; - (\"krsort\" function)" . "<br><br>";


/*------------------------------------------------------------------------

2. Getting a domain

------------------------------------------------------------------------*/
$url = "http://site.ru/folder/page.html";
$url1 = "http://sub.site.ru/folder/page.html";
$url2 = "http://some.strange_domain-really.tk/folder/page.html";

class Url
{
	static function domain($url){
		preg_match('/^(?:http(s)?(?::\/\/))?(www\.)?([a-zA-Z0-9-_\.?]+(\.?[a-zA-Z0-9]{2,}))/', $url, $matches);;
		return $matches[3];
	}
}

echo "<h3>2. Getting a domain</h3>";

echo "<b>" . Url::domain($url) . "</b>" . " &nbsp; (from &nbsp; $url)" . "<br><br>";
echo "<b>" . Url::domain($url1) . "</b>" . " &nbsp; (from &nbsp; $url1)" . "<br><br>";
echo "<b>" . Url::domain($url2) . "</b>" . " &nbsp; (from &nbsp; $url2)" . "<br><br>";





