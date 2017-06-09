<?php

/**
 * Model for working with users
 */
class User
{

    /**
     * Registration of user
     * @param string $name <p>Nname</p>
     * @param string $email <p>Email</p>
     * @param string $password <p>Password</p>
     * @return boolean <p>Execution result</p>
     */
    public static function register($name, $email, $password)
    {

        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name, email, password) '
                . 'VALUES (:name, :email, :password)';


        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Edit user info
     * @param integer $id <p>user id</p>
     * @param string $name <p>Name</p>
     * @param string $password <p>Password</p>
     * @return boolean <p>Execution result</p>
     */
    public static function edit($id, $name, $password)
    {

        $db = Db::getConnection();


        $sql = "UPDATE user 
            SET name = :name, password = :password 
            WHERE id = :id";


        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Check existence of $email and $password
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Password</p>
     * @return mixed : integer user id or false
     */
    public static function checkUserData($email, $password)
    {

        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();

        if ($user) {
            // if user exists
            return $user['id'];
        }
        return false;
    }

    /**
     * Remember user in session
     * @param integer $userId <p>user id</p>
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    /**
     * Returns user id <br/>
     * Or redirect to login page
     * @return string <p>User id</p>
     */
    public static function checkLogged()
    {
        // if user logged return his id
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    /**
     * Checks whether the user is a guest
     * @return boolean <p>Execution result</p>
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * Checks the name: no less than 2 characters
     * @param string $name <p>Name</p>
     * @return boolean <p>Execution result</p>
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Tests the phone: no less than 10
     * @param string $phone <p>Phone</p>
     * @return boolean <p>Execution result</p>
     */
    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }

    /**
     * Checks name: no less than 6 characters
     * @param string $password <p>Password</p>
     * @return boolean <p>Execution result</p>
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Checks email
     * @param string $email <p>E-mail</p>
     * @return boolean <p>Execution result</p>
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * Checks if the email is being used by another user
     * @param type $email <p>E-mail</p>
     * @return boolean <p>Execution result</p>
     */
    public static function checkEmailExists($email)
    {

        $db = Db::getConnection();


        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Returns the user with the specified id
     * @param integer $id <p>user id</p>
     * @return array <p>Array with information about the user</p>
     */
    public static function getUserById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

}
