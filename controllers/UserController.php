<?php

/**
 *
 */
class UserController
{
    /**
     *
     */
    public function actionRegister()
    {
		$view = new View();
		$view->display('layouts/header.php');

        $name = false;
        $email = false;
        $password = false;
        $result = false;

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // error flag
            $errors = false;

            // field validation
            if (!User::checkName($name)) {
                $errors[] = 'The name can not be shorter than 2 characters';
				$view->errors = $errors;
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Wrong email';
				$view->errors = $errors;
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Password must not be shorter than 6 characters';
				$view->errors = $errors;
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'This email is already in use';
				$view->errors = $errors;
            }
            
            if ($errors == false) {
                // registration new user
                $result = User::register($name, $email, $password);
            }
        }

		$view->name = $name;
		$view->email = $email;
		$view->password = $password;
		$view->result = $result;

		$view->display('user/register.php');

		$view->display('layouts/footer.php');

        return true;
    }
    
    /**
     *
     */
    public function actionLogin()
    {
		$view = new View();

        $email = false;
        $password = false;
        
        if (isset($_POST['submit'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            // error flag
            $errors = false;

            // fields validation
            if (!User::checkEmail($email)) {
                $errors[] = 'Wrong email';
                $view->errors = $errors;
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Password must not be shorter than 6 characters';
                $view->errors = $errors;
            }

            // checking user existence
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = 'Incorrect login data';
				$view->errors = $errors;
            } else {
                // Remember user in session
                User::auth($userId);

                // Redirect to main cabinet
                header("Location: /cabinet");
            }
        }

		$view->display('layouts/header.php');

		$view->email = $email;
		$view->password = $password;

		$view->display('user/login.php');

		$view->display('layouts/footer.php');

        return true;
    }

    /**
     * Delete user information from session
     */
    public function actionLogout()
    {
        session_start();
        
        // Delete user information from session
        unset($_SESSION["user"]);
        
        // Redirect to main page
        header("Location: /");
    }

}
