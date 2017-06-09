<?php


class AdminBookController extends AdminBase
{

    public function actionIndex()
    {
        self::checkAdmin();

        $bookList = Book::getBookListFull();

		$view = new View();
		$view->bookList = $bookList;

		$view->display('layouts/header_admin.php');

		$view->display('admin_book/index.php');
		$view->display('layouts/footer_admin.php');

        return true;
    }


	/**
	 * Creates a new book
	 */
    public function actionCreate()
    {
		$view = new View();

        self::checkAdmin();
        $result = false;

        if (isset($_POST['submit'])) {

            $options['book_title'] = $_POST['book_title'];
            $options['authors'] = $_POST['authors'];

            $errors = false;

			if ($id_exist = Book::checkBookExists($options['book_title'])) {
				$errors[] = 'The book is already in the table, id= '.$id_exist;
				$view->errors = $errors;
			}

			if ($errors == false) {
				$result = Book::createBook($options);
				header("Location: /admin/book");
			}
		}

		$view->display('layouts/header_admin.php');

		$view->display('admin_book/create.php');

		$view->display('layouts/footer_admin.php');

        return true;
    }

	/**
	 * Updates a book
	 */
    public function actionUpdate($id)
    {
		$view = new View();

        self::checkAdmin();

        $book = Book::getBookById($id);

        $authors = Author::getAuthorsByBookId($id);
		$authors_value = "";
		$authors_ids = [];

		foreach ($authors as $author) {
			$authors_value .= $author['author_name'] . "\r\n";
			$authors_ids[] = $author['author_id'];
		}

        if (isset($_POST['submit'])) {

			$options['book_title'] = $_POST['book_title'];
			$options['authors'] = $_POST['authors'];

            // save changes
			Book::updateBookById($id, $options, $authors_ids);

            header("Location: /admin/book");
        }

		$view->id = $id;
		$view->book = $book;
		$view->authors_value = $authors_value;

		$view->display('layouts/header_admin.php');

		$view->display('admin_book/update.php');

		$view->display('layouts/footer_admin.php');

        return true;
    }

	/**
	 * Deletes a book
	 */
    public function actionDelete($id)
    {
		$view = new View();

        self::checkAdmin();
		$book = Book::getBookById($id);

        if (isset($_POST['submit'])) {

			$authors = Author::getAuthorsByBookId($id);
			$authors_ids = [];

			foreach ($authors as $author) {
				$authors_ids[] = $author['author_id'];
			}

            Book::deleteBookById($id, $authors, $authors_ids);

            header("Location: /admin/book");
        }

		$view->book = $book;

		$view->display('layouts/header_admin.php');

		$view->display('admin_book/delete.php');

		$view->display('layouts/footer_admin.php');

        return true;
    }

}
