<?php


class BookController
{

    public function actionView($bookId)
    {

        $book = Book::getBookById($bookId);
        $authors = Book::getAuthorsByBookId($bookId);
		$authors_str = [];
		foreach ($authors as $author) {
			$authors_str[] = $author['author_name'];
		}

        require_once ROOT . '/views/book/view.php';
        return true;
    }

}
