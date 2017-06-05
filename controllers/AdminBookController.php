<?php


class AdminBookController extends AdminBase
{


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



    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();
        $result = false;

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

			}

			if ($errors == false) {
				$result = Book::createBook($options);
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

        $book = Book::getBookById($id);

        $authors = Book::getAuthorsByBookId($id);
		$authors_value = "";
		$authors_ids = [];

		foreach ($authors as $author) {
			$authors_value .= $author['author_name'] . "\r\n";
			$authors_ids[] = $author['author_id'];
		}

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
			$options['book_title'] = $_POST['book_title'];
			$options['authors'] = $_POST['authors'];

            // Сохраняем изменения
            if (Book::updateBookById($id, $options, $authors_ids)) {

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
			$authors = Book::getAuthorsByBookId($id);
			$authors_ids = [];
			//$authors_from_new_line = '';

			foreach ($authors as $author) {
				$authors_ids[] = $author['author_id'];
			}

            Book::deleteBookById($id, $authors, $authors_ids);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/book");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_book/delete.php');
        return true;
    }

}
