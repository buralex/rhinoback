<?php


class Book
{

    public static function getBookById($id)
    {
		$db = Db::getConnection();

		$sql = 'SELECT book_title FROM books WHERE book_id = :book_id';


		$result = $db->prepare($sql);
		$result->bindParam(':book_id', $id, PDO::PARAM_INT);

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$result->execute();

		// Получение и возврат результатов
		return $result->fetch();
    }

	public static function getAuthorsByBookId($id)
	{
		$db = Db::getConnection();

		$sql = ('SELECT author_name, authors.author_id '
				.'FROM authors INNER JOIN books_authors '
				.'ON authors.author_id = books_authors.author_id '
				.'WHERE books_authors.book_id = :book_id');


		$result = $db->prepare($sql);
		$result->bindParam(':book_id', $id, PDO::PARAM_INT);


		$result->setFetchMode(PDO::FETCH_ASSOC);

		$result->execute();

		// Получение и возврат результатов
		return $result->fetchAll();
	}


    public static function getBooksList()
    {

        $db = Db::getConnection();

        // Получение и возврат результатов
		$booksList = [];

		$sql = ('SELECT book_title, author_name, books.book_id FROM books '
				.'LEFT JOIN books_authors ON books.book_id = books_authors.book_id '
				.'LEFT JOIN authors ON books_authors.author_id = authors.author_id');

		$result = $db->prepare($sql);

		$result->execute();

		$row  = $result->fetchAll(PDO::FETCH_ASSOC);


		foreach ($row as $item) {
			$booksList[] = $item;
		}

        return $booksList;
    }

	public static function getBooksByAuthorId($id)
	{
		$db = Db::getConnection();

		//selects all of the books by the author name
		$sql = ('SELECT book_title, b.book_id '
			.'FROM books b LEFT JOIN books_authors ba '
			.'ON (b.book_id = ba.book_id) '
			.'LEFT JOIN authors a ON (ba.author_id = a.author_id) '
			.'WHERE a.author_id = :author_id');

		$result = $db->prepare($sql);


		if ($result->execute([':author_id' => $id])) {

			$row  = $result->fetchAll(PDO::FETCH_ASSOC);

			return $row;
		}
	}

	public static function getFilteredBooks($num)
	{
		$db = Db::getConnection();

		//selects all of the books by the author name
		$sql = ('SELECT COUNT(a.author_name) AS number_of_authors, '
				.'book_title, b.book_id, a.author_name FROM books b '
				.'LEFT JOIN books_authors ba ON (b.book_id = ba.book_id) '
				.'LEFT JOIN authors a ON (ba.author_id = a.author_id) '
				.'GROUP BY b.book_title HAVING number_of_authors > :num');

		$result = $db->prepare($sql);


		if ($result->execute([':num' => $num])) {

			$row  = $result->fetchAll(PDO::FETCH_ASSOC);

			return $row;
		}
	}


    public static function deleteBookById($id, $authors, $authors_ids)
    {
        $db = Db::getConnection();

		$sql = 'DELETE FROM books_authors WHERE books_authors.book_id = :book_id';
		$result = $db->prepare($sql);
		$result->bindParam(':book_id', $id, PDO::PARAM_INT);
		$result->execute();


		$x = 0;
		foreach ($authors as $author) {

			$sql = 'SELECT COUNT(*) FROM books_authors WHERE books_authors.author_id = :author_id';

			$result = $db->prepare($sql);

			$result->execute([":author_id" => $authors_ids[$x]]); //bind param

			// if author doesn't have any books in database
			if ( !($id_exist = $result->fetchColumn()) ){


				$sql = 'DELETE FROM authors WHERE author_id = :author_id';
				$result = $db->prepare($sql);

				$result->execute([":author_id" => $authors_ids[$x]]); //bind param
				$x++;
			}

		}


        $sql = 'DELETE FROM books WHERE book_id = :book_id';


        $result = $db->prepare($sql);
        $result->bindParam(':book_id', $id, PDO::PARAM_INT);
        return $result->execute();

    }


    public static function updateBookById($id, $options, $authors_ids)
    {
        $db = Db::getConnection();

        $sql = "UPDATE books SET book_title = :book_title WHERE book_id = :book_id";

        $result = $db->prepare($sql);
        $result->bindParam(':book_id', $id, PDO::PARAM_INT);
        $result->bindParam(':book_title', $options['book_title'], PDO::PARAM_INT);
		$result->execute();

		$authors = explode(PHP_EOL, rtrim($options['authors'], PHP_EOL));

		$sql = "UPDATE authors SET author_name = :author_name WHERE author_id = :author_id";

		$x = 0;
		foreach ($authors as $author) {
			$result = $db->prepare($sql);
			$result->bindParam(':author_name', $author, PDO::PARAM_INT);
			$result->bindParam(':author_id', $authors_ids[$x], PDO::PARAM_INT);
			$result->execute();
			$x++;
		}
    }


	public static function checkBookExists($book_title)
	{
		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM books WHERE book_title LIKE ?';

		$result = $db->prepare($sql);

		$result->execute(["%$book_title%"]); //bind param

		if ( $id_exist = $result->fetchColumn()){
			return $id_exist;
		}

		return false;
	}

	public static function checkAuthorExists($author_name)
	{

		$db = Db::getConnection();

		$sql = 'SELECT author_id, COUNT(*) FROM authors WHERE author_name LIKE ?';

		$result = $db->prepare($sql);

		$result->execute(["%$author_name%"]);

		if ( $id_exist = $result->fetchColumn()){
			return $id_exist;
		}

		return false;
	}


    public static function createBook($options)
    {
        $db = Db::getConnection();

		$sql = 'INSERT INTO books (book_title) VALUES (:book_title)';
		$result = $db->prepare($sql);

        if ($result->execute([':book_title' => $options['book_title']])) {
            $last_book_id = $db->lastInsertId();

        }

		$authors = explode(PHP_EOL, rtrim($options['authors'], PHP_EOL));

		$sql = 'INSERT INTO authors (author_name) VALUES (:author_name)';
		$result = $db->prepare($sql);

		$authors_ids = [];

		foreach ($authors as $author) {

			if ( $id_exist = self::checkAuthorExists($author)) {

				$authors_ids[] = $id_exist;

			} else if ($result->execute([':author_name' => $author])) {

				$last_author_id = $db->lastInsertId();
				$authors_ids[] = $last_author_id;

			}

		}


		$sql = 'INSERT INTO books_authors (book_id, author_id) VALUES (:book_id, :author_id)';
		$result = $db->prepare($sql);

		foreach ($authors_ids as $item) {

			if ($result->execute([':book_id' => $last_book_id, ':author_id' => $item])) {
				$last_author_id = $db->lastInsertId();
			}
		}

        return 0;
    }

}
