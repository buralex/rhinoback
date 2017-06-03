<?php



$a = ['lena', 'ira', 'misha', 'Lisa', "Masha"];



$q = ($_POST['title']);
$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
	$q = strtolower($q);
	$len=strlen($q);
//	var_dump($len);
	foreach($a as $name) {
		if (stristr($q, $aaa = substr($name, 0, $len))) {
//			var_dump($q);
//			var_dump($aaa);

			if ($hint === "") {
				$hint = $name;
			} else {
				$hint .= "<br>" . "$name";
			}
		}
	}
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
