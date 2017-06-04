<?php

/**
 * Класс Product - модель для работы с товарами
 */
class Book
{

    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 6;

    /**
     * Возвращает массив последних товаров
     * @param type $count [optional] <p>Количество</p>
     * @param type $page [optional] <p>Номер текущей страницы</p>
     * @return array <p>Массив с товарами</p>
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, name, price, is_new FROM product '
                . 'WHERE status = "1" ORDER BY id DESC '
                . 'LIMIT :count';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        // Выполнение коменды
//        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productsList;
    }

    /**
     * Возвращает список товаров в указанной категории
     * @param type $categoryId <p>id категории</p>
     * @param type $page [optional] <p>Номер страницы</p>
     * @return type <p>Массив с товарами</p>
     */
    public static function getProductsListByCategory($categoryId, $page = 1)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, name, price, is_new FROM product '
                . 'WHERE status = 1 AND category_id = :category_id '
                . 'ORDER BY id ASC LIMIT :limit OFFSET :offset';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $products;
    }

    /**
     * Возвращает продукт с указанным id
     * @param integer $id <p>id товара</p>
     * @return array <p>Массив с информацией о товаре</p>
     */
    public static function getBookById($id)
    {
		$db = Db::getConnection();

		// Текст запроса к БД
		$sql = 'SELECT book_title FROM books WHERE book_id = :book_id';

		// Используется подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':book_id', $id, PDO::PARAM_INT);

		// Указываем, что хотим получить данные в виде массива
		$result->setFetchMode(PDO::FETCH_ASSOC);

		// Выполнение коменды
		$result->execute();

		// Получение и возврат результатов
		return $result->fetch();
    }

	public static function getAuthorsByBookId($id)
	{
		$db = Db::getConnection();

				$sql = ('SELECT author_name, authors.author_id '
						.'FROM authors INNER JOIN books_authors '
						.'ON authors.author_id = books_authors.author_id '
						.'WHERE books_authors.book_id = :book_id');

		// Используется подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':book_id', $id, PDO::PARAM_INT);

		// Указываем, что хотим получить данные в виде массива
		$result->setFetchMode(PDO::FETCH_ASSOC);

		// Выполнение коменды
		$result->execute();

		// Получение и возврат результатов
		return $result->fetchAll();
	}

    /**
     * Возвращаем количество товаров в указанной категории
     * @param integer $categoryId
     * @return integer
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM product WHERE status="1" AND category_id = :category_id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Возвращает список товаров с указанными индентификторами
     * @param array $idsArray <p>Массив с идентификаторами</p>
     * @return array <p>Массив со списком товаров</p>
     */
    public static function getProdustsByIds($idsArray)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Превращаем массив в строку для формирования условия в запросе
        $idsString = implode(',', $idsArray);

        // Текст запроса к БД
        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }

    /**
     * Возвращает список рекомендуемых товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getRecommendedProducts()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
//        $result = $db->query('SELECT id, name, price, is_new FROM product '
//                . 'WHERE status = "1" AND is_recommended = "1" '
//                . 'ORDER BY id DESC');
//        $i = 0;
//        $productsList = array();
//        while ($row = $result->fetch()) {
//            $productsList[$i]['id'] = $row['id'];
//            $productsList[$i]['name'] = $row['name'];
//            $productsList[$i]['price'] = $row['price'];
//            $productsList[$i]['is_new'] = $row['is_new'];
//            $i++;
//        }
        //return $productsList;
    }

    /**
     * Возвращает список товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getBooksList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
		$booksList = [];


				$sql = ('SELECT book_title, author_name, books.book_id FROM books '
						.'LEFT JOIN books_authors ON books.book_id = books_authors.book_id '
						.'LEFT JOIN authors ON books_authors.author_id = authors.author_id');

//		$sql = ('SELECT authors.author_id, author_name '
//				.'FROM authors INNER JOIN books_authors '
//				.'ON authors.author_id = books_authors.author_id '
//				.'WHERE books_authors.book_id = "72"');


		//$sql = ('SELECT books.book_title, authors.author_name, FROM books, authors, books_authors');

//		SELECT isbn, title, author_ordinal, first, last
//   FROM books b
//   LEFT JOIN books_authors ba ON (b.id = ba.book_id)
//   LEFT JOIN authors a ON (ba.author_id = a.id)
//  WHERE isbn = '978whatever'
/*
		$sql = ('SELECT a.author_id, author_name '
				.'FROM books b LEFT JOIN books_authors ba '
				.'ON (b.book_id = ba.book_id) '
				.'LEFT JOIN authors a ON (ba.author_id = a.author_id) '
				.'WHERE book_title LIKE "%"');

		var_dump($sql);
*/
		//$sql = ('SELECT book_id, title  FROM books ORDER BY book_id ASC');


		$result = $db->prepare($sql);

		$result->execute();

		$row  = $result->fetchAll(PDO::FETCH_ASSOC);


		foreach ($row as $item) {
			$booksList[] = $item;
			//$productsList['title'] = $item['title'];
		}
		//var_dump($booksList);
//        $i = 0;
//        while ($row = $result->fetch()) {
//            $productsList[$i]['id'] = $row['id'];
//            $productsList[$i]['name'] = $row['name'];
//            $productsList[$i]['code'] = $row['code'];
//            $productsList[$i]['price'] = $row['price'];
//            $i++;
//        }
        return $booksList;
    }

    /**
     * Удаляет товар с указанным id
     * @param integer $id <p>id товара</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteProductById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM product WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редактирует товар с заданным id
     * @param integer $id <p>id товара</p>
     * @param array $options <p>Массив с информацей о товаре</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateBookById($id, $options, $authors_ids)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE books SET book_title = :book_title WHERE book_id = :book_id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':book_id', $id, PDO::PARAM_INT);
        $result->bindParam(':book_title', $options['book_title'], PDO::PARAM_INT);
		$result->execute();

		$authors = explode(PHP_EOL, rtrim($options['authors'], PHP_EOL));
		var_dump($authors_ids);
		var_dump($authors);

//die();
		$sql = "UPDATE authors SET author_name = :author_name WHERE author_id = :author_id";
		$x = 0;
		foreach ($authors as $author) {
			$result = $db->prepare($sql);
			$result->bindParam(':author_name', $author, PDO::PARAM_INT);
			$result->bindParam(':author_id', $authors_ids[$x], PDO::PARAM_INT);
			$result->execute();
			$x++;
		}

		//return ;
    }


	public static function checkBookExists($book_title)
	{
		// Соединение с БД
		$db = Db::getConnection();

		// Текст запроса к БД
		//$sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
		$sql = 'SELECT COUNT(*) FROM books WHERE book_title LIKE ?';

		// Получение результатов. Используется подготовленный запрос
		$result = $db->prepare($sql);
		//$result->bindParam(':email', $email, PDO::PARAM_STR);
//		$param = $_POST['authors'];
//		var_dump($param);
		$result->execute(["%$book_title%"]);
//		$row = $result->fetchAll(PDO::FETCH_ASSOC);
//		var_dump($row);

		if ( $id_exist = $result->fetchColumn()){
			return $id_exist;
		}

		return false;
	}

	public static function checkAuthorExists($author_name)
	{
		// Соединение с БД
		$db = Db::getConnection();

		// Текст запроса к БД
		//$sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
		$sql = 'SELECT author_id, COUNT(*) FROM authors WHERE author_name LIKE ?';

		// Получение результатов. Используется подготовленный запрос
		$result = $db->prepare($sql);
		//$result->bindParam(':email', $email, PDO::PARAM_STR);
//		$param = $_POST['authors'];
//		var_dump($param);
		$result->execute(["%$author_name%"]);
//		$row = $result->fetchAll(PDO::FETCH_ASSOC);
//		var_dump($row);

		if ( $id_exist = $result->fetchColumn()){
			return $id_exist;
		}

		return false;
	}

    /**
     * Добавляет новый товар
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createBook($options)
    {
        // Соединение с БД
        $db = Db::getConnection();
		//var_dump($options);

		$sql = 'INSERT INTO books (book_title) VALUES (:book_title)';
		$result = $db->prepare($sql);

        if ($result->execute([':book_title' => $options['book_title']])) {
            $last_book_id = $db->lastInsertId();
			var_dump($last_book_id);
        }

		$authors = explode(PHP_EOL, rtrim($options['authors'], PHP_EOL));

		$sql = 'INSERT INTO authors (author_name) VALUES (:author_name)';
		$result = $db->prepare($sql);
		$authors_ids = [];
		//die();
		foreach ($authors as $author) {

			if ( $id_exist = self::checkAuthorExists($author)) {

				$authors_ids[] = $id_exist;
				//$author
			} else if ($result->execute([':author_name' => $author])) {

				$last_author_id = $db->lastInsertId();
				$authors_ids[] = $last_author_id;
				//var_dump($authors_ids);
			}

		}

//var_dump($authors_ids);

		//die();

		$sql = 'INSERT INTO books_authors (book_id, author_id) VALUES (:book_id, :author_id)';
		$result = $db->prepare($sql);

		foreach ($authors_ids as $item) {

			if ($result->execute([':book_id' => $last_book_id, ':author_id' => $item])) {
				$last_author_id = $db->lastInsertId();
			}
		}


        // Иначе возвращаем 0
        return 0;
    }

    /**
     * Возвращает текстое пояснение наличия товара:<br/>
     * <i>0 - Под заказ, 1 - В наличии</i>
     * @param integer $availability <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }

    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/products/';

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

}
