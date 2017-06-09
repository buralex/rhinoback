<?php


class AdminBookController extends AdminBase
{

    public function actionIndex()
    {
        self::checkAdmin();

        $bookList = Book::getBookListFull();

		$view = new View();
		$view->bookList = $bookList;

		$view->display('admin_book/index.php');

        return true;
    }



    public function actionCreate()
    {
        self::checkAdmin();
        $result = false;

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



        require_once ROOT . '/views/admin_book/create.php';
        return true;
    }


    public function actionUpdate($id)
    {

        self::checkAdmin();

        $book = Book::getBookById($id);

        $authors = Author::getAuthorsByBookId($id);
		$authors_value = "";
		$authors_ids = [];

		foreach ($authors as $author) {
			$authors_value .= $author['author_name'] . "\r\n";
			$authors_ids[] = $author['author_id'];
		}

        // Обработка формы
        if (isset($_POST['submit'])) {

			$options['book_title'] = $_POST['book_title'];
			$options['authors'] = $_POST['authors'];

            // Сохраняем изменения
			Book::updateBookById($id, $options, $authors_ids);


            header("Location: /admin/book");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_book/update.php');
        return true;
    }


    public function actionDelete($id)
    {

        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {


			$authors = Author::getAuthorsByBookId($id);
			$authors_ids = [];


			foreach ($authors as $author) {
				$authors_ids[] = $author['author_id'];
			}

            Book::deleteBookById($id, $authors, $authors_ids);


            header("Location: /admin/book");
        }


        require_once(ROOT . '/views/admin_book/delete.php');
        return true;
    }

}
