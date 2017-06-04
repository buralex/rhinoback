<?php

//var_dump($_POST);

/**
 * Контроллер CartController
 */
class LibraryController
{
    /**
     * Action for library
     */
    public function actionIndex()
    {
//        // Список категорий для левого меню
//        $categories = Category::getCategoriesList();
//
//        // Список последних товаров
//        $latestProducts = Product::getLatestProducts(6);
//
//        // Список товаров для слайдера
//        $sliderProducts = Product::getRecommendedProducts();
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

        // Переменные для формы
//        $userEmail = false;
//        $userText = false;
//        $result = false;
//
//        // Обработка формы
//        if (isset($_POST['submit'])) {
//            // Если форма отправлена
//            // Получаем данные из формы
//            $userEmail = $_POST['userEmail'];
//            $userText = $_POST['userText'];
//
//            // Флаг ошибок
//            $errors = false;
//
//            // Валидация полей
//            if (!User::checkEmail($userEmail)) {
//                $errors[] = 'Неправильный email';
//            }
//
//            if ($errors == false) {
//                // Если ошибок нет
//                // Отправляем письмо администратору
//                $adminEmail = 'php.start@mail.ru';
//                $message = 'Текст: {$userText}. От {$userEmail}';
//                $subject = 'Тема письма';
//                $result = mail($adminEmail, $subject, $message);
//                $result = true;
//            }
//        }
//
//        // Подключаем вид
//        require_once ROOT . '/views/site/contact.php';
//        return true;
    }
    
    /**
     * Action для страницы 'О магазине'
     */

}
