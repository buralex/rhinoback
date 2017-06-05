<?php

class Library
{


	public static function show_text()
	{
		var_dump('show_text work');
		var_dump(TEXT);

	}

	public static function get_bookor_author()
	{

		$q = ' ';
	$q = $_POST['search_field'];

		$db = Db::getConnection();


		$sql = ('SELECT a.author_id, author_name '
			.'FROM books b LEFT JOIN books_authors ba '
			.'ON (b.book_id = ba.book_id) '
			.'LEFT JOIN authors a ON (ba.author_id = a.author_id) '
			.'WHERE book_title LIKE "'.$q.'%"');
		var_dump($sql);
		$result = $db->prepare($sql);
		$result->execute();
		$row  = $result->fetchAll(PDO::FETCH_ASSOC);

		$book_titles = [];
		$authors_names = [];
		$a = [];
		foreach ($row as $item => $value) {
			$a[] = $value['author_name'];
		}

		var_dump($row);
		return "fsdafasdfasdfas" ;

	}
}