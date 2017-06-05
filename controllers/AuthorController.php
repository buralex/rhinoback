<?php


class AuthorController
{


    public function actionView($authorId)
    {

        $author = Author::getAuthorById($authorId);
        $books = Book::getBooksByAuthorId($authorId);
		$books_str = [];
		foreach ($books as $book) {
			$books_str[] = $book['book_title'];
		}

        require_once ROOT . '/views/author/view.php';
        return true;
    }

}
