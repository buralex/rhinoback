<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02.06.2017
 * Time: 13:16
 */
class library
{
	public static function get_bookor_author()
	{
//		$db = Db::getConnection();
//		$productsList = [];
//
//		$sql = ('SELECT a.author_id, author_lastname '
//			.'FROM books b LEFT JOIN books_authors ba '
//			.'ON (b.book_id = ba.book_id) '
//			.'LEFT JOIN authors a ON (ba.author_id = a.author_id) '
//			.'WHERE book_title LIKE "new%"');
//
//		var_dump($sql);
//
//		//$sql = ('SELECT book_id, title  FROM books ORDER BY book_id ASC');
//
//		$result = $db->prepare($sql);
//
//		$result->execute();
//
//		$row  = $result->fetchAll(PDO::FETCH_ASSOC);
//
//
//		foreach ($row as $item) {
//			$productsList[] = $item;
//		}
//		var_dump($productsList);
//	$search_q = $_POST['search_field'];
	$q = $_POST['search_field'];
//		$search_q = preg_replace(".*", "", $search_q);
//
		$db = Db::getConnection();
//		$sql = ('SELECT author_lastname, book_title FROM authors LEFT JOIN books');
//		$sql = ('SELECT ba.author_id, ba.book_id, a.author_lastname, b.book_title '
//				.'FROM books_authors ba '
//         		.'LEFT JOIN books b ON b.book_id = ba.book_id '
//				.'LEFT JOIN authors a ON a.author_id = ba.author_id');

		$sql = ('SELECT a.author_id, author_lastname '
			.'FROM books b LEFT JOIN books_authors ba '
			.'ON (b.book_id = ba.book_id) '
			.'LEFT JOIN authors a ON (ba.author_id = a.author_id) '
			.'WHERE book_title LIKE "'.$q.'%"');
		var_dump($sql);
		$result = $db->prepare($sql);
		$result->execute();
		$row  = $result->fetchAll(PDO::FETCH_ASSOC);


		//var_dump($sql);
//		var_dump($search_q);
		$book_titles = [];
		$authors_names = [];
		$a = [];
		foreach ($row as $item => $value) {
//			$book_titles[] = [$item['book_title']];
//			$authors_names[] = [$item['author_lastname']];
			$a[] = $value['author_lastname'];
		}

// get the q parameter from URL
		//$q = $_REQUEST["q"];
		var_dump($row);
		$hint = " ";
//		//$a = ['helen'];
//// lookup all hints from array if $q is different from ""
//		if ($q !== "") {
//			$q = strtolower($q);
//			$len=strlen($q);
//			foreach($a as $name) {
//				if (stristr($q, substr($name, 0, $len))) {
//					if ($hint === "") {
//						$hint = $name;
//					} else {
//						$hint .= ", $name";
//					}
//				}
//			}
//		}
//
//// Output "no suggestion" if no hint was found or output correct values
		return $hint === "" ? "no suggestion" : $hint;

	}
}