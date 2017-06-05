<?php


class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {

        require_once ROOT . '/views/site/index.php';
        return true;
    }

    /**
     * Action для страницы 'Контакты'
     */
    public function actionContact()
    {

    }


	public function actionReverse()
	{

		require_once(ROOT . '/views/site/reverse.php');
		return true;
	}

	public function actionExtract()
	{

		require_once ROOT . '/views/site/extract.php';
		return true;
	}

}
