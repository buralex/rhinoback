<?php

class LibraryController
{
    /**
     * Action for library
     */
    public function actionIndex()
    {

		if (isset($_POST['title'])) {
			var_dump($_POST['title']);

		}

        // Подключаем вид
		require_once ROOT . '/views/site/library.php';
        return true;
    }

    /**
     * Action для страницы 'Контакты'
     */
    public function actionContact()
    {

    }

}
