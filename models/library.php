<?php

class Library
{


	public static function show_text()
	{
		var_dump('show_text work');
//		var_dump($_GET);

		var_dump(TEXT);
		//var_dump($_POST);
		//$text = $_POST['title'];
	}

	public static function get_bookor_author()
	{
//		$db = Db::getConnection();
//		$productsList = [];


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
		$q = ' ';
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
		$book_titles = [];
		$authors_names = [];
		$a = [];
		foreach ($row as $item => $value) {
			$a[] = $value['author_lastname'];
		}

		var_dump($row);
		return "fsdafasdfasdfas" ;

	}
}