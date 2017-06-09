<?php


class AdminController extends AdminBase
{
    /**
     * Action for index page admin panel
     */
    public function actionIndex()
    {
		$view = new View();

        self::checkAdmin();

		$view->display('layouts/header_admin.php');

		$view->display('admin/index.php');

		$view->display('layouts/footer_admin.php');

        return true;
    }

}
