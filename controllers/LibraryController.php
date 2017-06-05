<?php

class LibraryController
{

    public function actionIndex()
    {

        // Подключаем вид
		require_once ROOT . '/views/site/library.php';
        return true;
    }


    public function actionFiltered()
    {
		$books = Book::getFilteredBooks(2);

		require_once ROOT . '/views/site/filtered.php';
		return true;
    }

}
