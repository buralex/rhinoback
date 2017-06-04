<?php

/**
 * Контроллер AdminProductController
 * Управление товарами в админпанели
 */
class AdminBookController extends AdminBase
{

    /**
     * Action для страницы "Управление товарами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список товаров
        $booksList = Book::getBooksList();

        // Подключаем вид
        require_once(ROOT . '/views/admin_book/index.php');
        return true;
    }


    /**
     * Action для страницы "Добавить товар"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();
        $result = false;

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['book_title'] = $_POST['book_title'];
            $options['authors'] = $_POST['authors'];

            // Флаг ошибок в форме
            $errors = false;


			if ($id_exist = Book::checkBookExists($options['book_title'])) {
				$errors[] = 'The book is already in the table, id= '.$id_exist;
//				var_dump('booo i s a ljalsd f');
//				var_dump($errors);
			}
			//die();

                // Если ошибок нет
                // Добавляем новый товар
			if ($errors == false) {
				// Если ошибок нет
				// Регистрируем пользователя
				$result = Book::createBook($options);




			// Перенаправляем пользователя на страницу управлениями товарами
			header("Location: /admin/book");
			}
		}


        // Подключаем вид
        require_once ROOT . '/views/admin_book/create.php';
        return true;
    }

    /**
     * Action для страницы "Редактировать товар"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
//        $categoriesList = Category::getCategoriesListAdmin();

        // Получаем данные о конкретном заказе
        $book = Book::getBookById($id);

        $authors = Book::getAuthorsByBookId($id);
		$authors_value = "";
		$authors_ids = [];
        //$authors_from_new_line = '';

		foreach ($authors as $author) {
			$authors_value .= $author['author_name'] . "\r\n";
			$authors_ids[] = $author['author_id'];
		}

//        var_dump($authors);
//        var_dump($authors_ids);
//        echo $authors_value;
//		die();



        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
			$options['book_title'] = $_POST['book_title'];
			$options['authors'] = $_POST['authors'];

            // Сохраняем изменения
            if (Book::updateBookById($id, $options, $authors_ids)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
//                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
//
//                    // Если загружалось, переместим его в нужную папке, дадим новое имя
//                   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
//                }
            }

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/book");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_book/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить товар"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Product::deleteProductById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    }

}
