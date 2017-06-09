<?php

class LibraryController
{

	/**
	 * Shows table with book titles and authors
	 */
    public function actionIndex()
    {
    	$books = Book::getBookList();
    	$authors = Author::getAuthorList();

		if (isset($_POST['submit'])) {

			// go to book page
			if (isset($_POST['book_title'])) {
				$book = Book::getBookByTitle($_POST['book_title']);
				header("Location: /library/book/" . $book[book_id]);
			}

			// go to author page
			if (isset($_POST['author_name'])) {
				$author = Author::getAuthorByName($_POST['author_name']);
				header("Location: /library/author/" . $author[author_id]);
			}
		}

		$view = new View();
		$view->books = $books;
		$view->authors = $authors;

		$view->display('library/index.php');

        return true;
    }

	/**
	 * Filter books by author quantity
	 */
    public function actionFiltered()
    {
		$books = Book::getFilteredBooks(2);

		$view = new View();
		$view->books = $books;

		$view->display('library/filtered.php');

		return true;
    }


	/**
	 * Autocomplete book title
	 */
	public function actionBookHint($searchText)
	{
		$book_title = urldecode($searchText);

		$bookList = Book::getBookHints($book_title);

		echo json_encode($bookList);
	}

	/**
	 * Autocomplete author name
	 */
	public function actionAuthorHint($searchText)
	{
		$author_name = urldecode($searchText);

		$authorList = Author::getAuthorHints($author_name);

		echo json_encode($authorList);
	}

	/**
	 * Shows book by id
	 */
	public function actionShowBook($book_id)
	{
		$book = Book::getBookById($book_id);
		$authors = Author::getAuthorsByBookId($book_id);

		$authors_str = [];
		foreach ($authors as $author) {
			$authors_str[] = $author['author_name'];
		}

		$view = new View();
		$view->book = $book;
		$view->authors = $authors;
		$view->authors_str = $authors_str;

		$view->display('book/view.php');

		return true;
	}

	/**
	 * Shows author by id
	 */
	public function actionShowAuthor($author_id)
	{
		$author = Author::getAuthorById($author_id);
		$books = Book::getBooksByAuthorId($author_id);
		$books_str = [];
		foreach ($books as $book) {
			$books_str[] = $book['book_title'];
		}


		$view = new View();
		$view->books = $books;
		$view->author = $author;
		$view->books_str = $books_str;

		$view->display('author/view.php');

		return true;
	}

	/**
	 * Filters books written by certain author
	 */
	public function actionFilterBooks($author_name)
	{
		$author_name = urldecode($author_name);

		$author = Author::getAuthorByName($author_name);

		$books = Book::getBooksByAuthorId($author['author_id']);

		echo json_encode($books);
	}

	/**
	 * Filters authors of certain book
	 */
	public function actionFilterAuthors($book_title)
	{
		$book_title = urldecode($book_title);

		$book = Book::getBookByTitle($book_title);

		$authors = Author::getAuthorsByBookId($book['book_id']);

		echo json_encode($authors);
	}

}
