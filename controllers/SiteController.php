<?php


class SiteController
{

	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
		$uri = $this->getURI();
        require_once ROOT . '/views/site/index.php';
        return true;
    }


	public function actionReverse()
	{
		$uri = $this->getURI();
		require_once(ROOT . '/views/site/reverse.php');
		return true;
	}

	public function actionExtract($action_name = 'extract')
	{
		$uri = $this->getURI();
		require_once ROOT . '/views/site/extract.php';
		return true;
	}

}
