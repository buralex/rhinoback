<?php

$arr = ["h","e","l","l","o"];

/*
 * for loop
 */
$method_1 = function ($arr) {
	$arr_rev = [];

	for ($i = count($arr)-1; $i >= 0 ; $i--) {
		$arr_rev[] = $arr[$i];
	}
	echo join(" ", $arr_rev);
};

/*
 * unshift fnc
 */
$method_2 = function ($arr) {
	$arr_rev = [];

	for ($i = 0; $i < count($arr) ; $i++) {
		array_unshift($arr_rev, $arr[$i]);
	}
	echo join(" ", $arr_rev);
};

/*
 * krsort fnc
 */
$method_3 = function ($arr) {
	$arr_rev = $arr;

	krsort($arr_rev);
	echo join(" ", $arr_rev);
};

echo join(" ", $arr);
echo "<br>";

$method_1($arr);
echo "<br>";

$method_2($arr);
echo "<br>";

$method_3($arr);

/*----------------------------------------------------

-------------------------------------------------------*/
$url = "http://site.ru/folder/page.html";
$url1 = "http://sub.site.ru/folder/page.html";
$url2 = "http://si0-fds_sdk.fjl.te.ru/folder/page.html";
$url3 = "http://rhinoback/";

function get_domain($url){
	preg_match('/^(?:http(s)?(?::\/\/))?(www\.)?([a-zA-Z0-9-_\.?]+(\.?[a-zA-Z0-9]{2,}))/', $url, $matches);;
	echo $matches[3];
}

echo "<br>";
get_domain($url);

echo "<br>";
get_domain($url1);

echo "<br>";
get_domain($url2);

echo "<br>";
get_domain($url3);

