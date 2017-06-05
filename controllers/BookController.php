<?php


class BookController
{

    public function actionView($bookId)
    {

        $book = Book::getBookById($bookId);

        require_once ROOT . '/views/book/view.php';
        return true;
    }

}
