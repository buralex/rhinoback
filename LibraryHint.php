<?php

define('ROOTPATH', str_replace("\\","/", __DIR__));
include_once ROOTPATH . '/components/Autoload.php';define('ROOT', str_replace("\\","/", __DIR__));
include_once ROOTPATH . '/components/Autoload.php';

//$a = ['lena Ivanova', 'ira', 'misha', 'Lisa', "Masha"];

$db = Db::getConnection();

//$q = ($_POST['title']);
$hint = "";

$sql = 'SELECT * FROM books WHERE book_title LIKE ?';
$result = $db->prepare($sql);

$param = $_POST['book_title']; // search text - to param

if ($result->execute(["%$param%"])) {
	//$last_book_id = $db->lastInsertId();
	//var_dump($result);
	$row  = $result->fetchAll(PDO::FETCH_ASSOC);
	//var_dump($row);
//	foreach ($row as $item) {
//	}
	echo json_encode($row);
}
//
//// lookup all hints from array if $q is different from ""
//if ($q !== "") {
//	$q = strtolower($q);
//	$len=strlen($q);
////	var_dump($len);
//	foreach($a as $name) {
//		if (stristr($q, $aaa = substr($name, 0, $len))) {
////			var_dump($q);
////			var_dump($aaa);
//
//			if ($hint === "") {
//				$hint = $name;
//			} else {
//				$hint .= "<br>" . "$name";
//			}
//		}
//	}
//}
//
//// Output "no suggestion" if no hint was found or output correct values
//echo $hint === "" ? "no suggestion" : $hint;
