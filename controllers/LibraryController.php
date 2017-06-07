<?php

class LibraryController
{
	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

    public function actionIndex()
    {

		$uri = $this->getURI();

		require_once ROOT . '/views/site/library.php';
        return true;
    }


    public function actionFiltered()
    {
		$uri = $this->getURI();
		$books = Book::getFilteredBooks(2);

		require_once ROOT . '/views/site/filtered.php';
		return true;
    }

}
