<?php


class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
    	$view = new View();
		$view->display('layouts/header.php');

		$view->display('site/index.php');

		$view->display('layouts/footer.php');

        return true;
    }


	public function actionReverse()
	{
		$view = new View();
		$view->display('layouts/header.php');

		$view->display('site/reverse.php');

		$view->display('layouts/footer.php');

		return true;
	}

	public function actionExtract($action_name = 'extract')
	{

		require_once ROOT . '/views/site/extract.php';
		return true;
	}

}
