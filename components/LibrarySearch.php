<?php

//var_dump($_POST['title']);

if (isset($_POST['title'])) {
	// Если форма отправлена
	// Получаем данные из формы
//			var_dump($_POST['search_field']);
//
//			$a = Library::get_bookor_author();
//			var_dump($a);
	//$var = 'this is var';
}


//$q = $_POST["title"];

$a = ['lena', 'ira', 'misha'];


//var_dump($q);
$q = ($_POST['title']);
$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
	$q = strtolower($q);
	$len=strlen($q);
	var_dump($len);
	foreach($a as $name) {
		if (stristr($q, $aaa = substr($name, 0, $len))) {
			var_dump($q);
			var_dump($aaa);

			if ($hint === "") {
				$hint = $name;
			} else {
				$hint .= ", $name";
			}
		}
	}
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
