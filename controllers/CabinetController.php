<?php

/**
 * CabinetController
 * User cabinet
 */
class CabinetController
{

    /**
     *
     */
    public function actionIndex()
    {
        // getting user id from session
        $userId = User::checkLogged();

        // getting user info from DB
        $user = User::getUserById($userId);

		$view = new View();
		$view->user = $user;

		$view->display('layouts/header.php');
		$view->display('cabinet/index.php');
		$view->display('layouts/footer.php');

        return true;
    }

    /**
     * Edit user info
     */
    public function actionEdit()
    {
		$view = new View();

		// getting user id from session
        $userId = User::checkLogged();

		// getting user info from DB
        $user = User::getUserById($userId);

        // filling in the fields of form
        $name = $user['name'];
        $password = $user['password'];

        // result flag
        $result = false;


        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $password = $_POST['password'];

            // error flag
            $errors = false;

            // validation
            if (!User::checkName($name)) {
                $errors[] = 'The name can not be shorter than 2 characters';
				$view->errors = $errors;
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Password must not be shorter than 6 characters';
				$view->errors = $errors;
            }

            if ($errors == false) {
                // save changes
                $result = User::edit($userId, $name, $password);
            }
        }

		$view->result = $result;
		$view->name = $name;
		$view->password = $password;

		$view->display('layouts/header.php');
		$view->display('cabinet/edit.php');
		$view->display('layouts/footer.php');

        return true;
    }

}
