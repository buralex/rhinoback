<?php

/**
 * Контроллер CartController
 */
class SiteController
{

    /**
     * Action для главной страницы
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

        // Подключаем вид
        require_once ROOT . '/views/site/index.php ';
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
    public function actionLibrary()
    {
    	//include_once ROOT . '/components/gethint.php';
    	//require_once ROOT . '/components/gethint.php';
		//var_dump($text);
		//var_dump($_GET);
		//var_dump($text);
		//Library::show_text();

		if (isset($_POST['search_field'])) {
			// Если форма отправлена
			// Получаем данные из формы
//			var_dump($_POST['search_field']);
//
//			$a = Library::get_bookor_author();
//			var_dump($a);
			//$var = 'this is var';
		}


		// Подключаем вид
        require_once ROOT . '/views/site/library.php';
		//var_dump();
		//$text = $_POST['title'];
		//echo "$text";
        return true;
    }

	public function actionReverse()
	{



		// Подключаем вид
		require_once(ROOT . '/views/site/reverse.php');
		return true;
	}

	public function actionExtract()
	{


		// Подключаем вид
		require_once ROOT . '/views/site/extract.php';
		return true;
	}

}
