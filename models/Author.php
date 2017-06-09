<?php

class Author
{

	/**
	 * Returns author list
	 */
	public static function getAuthorList()
	{

		$db = Db::getConnection();

		$sql = ('SELECT * FROM authors ORDER BY author_name');

		$result = $db->prepare($sql);

		$result->execute();

		$authorList  = $result->fetchAll(PDO::FETCH_ASSOC);

		return $authorList;
	}

    public static function getAuthorById($id)
    {
		$db = Db::getConnection();

		$sql = 'SELECT author_name FROM authors WHERE author_id = :author_id';

		$result = $db->prepare($sql);
//		$result->bindParam(':author_id', $id, PDO::PARAM_INT);

		$result->execute([':author_id' => $id]);

		return $result->fetch(PDO::FETCH_ASSOC);
    }

	public static function getAuthorByName($author_name)
	{
		$db = Db::getConnection();

		$sql = 'SELECT * FROM authors WHERE author_name = :author_name';

		$result = $db->prepare($sql);
//		$result->bindParam(':author_name', $author_name, PDO::PARAM_INT);

		$result->execute([':author_name'=> $author_name]);

		return $result->fetch(PDO::FETCH_ASSOC);
	}


	/**
	 * Returns author list by author name
	 */
	public static function getAuthorHints($author_name)
	{
		$db = Db::getConnection();

		$sql = 'SELECT author_name FROM authors WHERE author_name LIKE ?';
		$result = $db->prepare($sql);
		$authorList = [];

		if ($result->execute(["%$author_name%"])) {

			$row  = $result->fetchAll(PDO::FETCH_ASSOC);

			foreach ($row as $item => $value){
				$authorList[] = $value['author_name'];
			}

			return $authorList;
		}
	}

	/**
	 * Returns author list by book id
	 */
	public static function getAuthorsByBookId($id)
	{
		$db = Db::getConnection();

		$sql = ('SELECT author_name, authors.author_id '
			.'FROM authors INNER JOIN books_authors '
			.'ON authors.author_id = books_authors.author_id '
			.'WHERE books_authors.book_id = :book_id');


		$result = $db->prepare($sql);
		$result->bindParam(':book_id', $id, PDO::PARAM_INT);

		$result->execute();

		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

}
