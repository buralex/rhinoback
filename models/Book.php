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
        // Соединение с БД


        // Получение и возврат результатов
        //return $result->fetch();
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
    public static function getProductsList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
		$productsList = [];

//		$sql = ('SELECT authors.author_id, author_lastname '
//				.'FROM authors INNER JOIN books_authors '
//				.'ON authors.author_id = books_authors.author_id '
//				.'WHERE books_authors.book_id = "72"');


		//$sql = ('SELECT books.book_title, authors.author_lastname, FROM books, authors, books_authors');

//		SELECT isbn, title, author_ordinal, first, last
//   FROM books b
//   LEFT JOIN books_authors ba ON (b.id = ba.book_id)
//   LEFT JOIN authors a ON (ba.author_id = a.id)
//  WHERE isbn = '978whatever'

		$sql = ('SELECT a.author_id, author_lastname '
				.'FROM books b LEFT JOIN books_authors ba '
				.'ON (b.book_id = ba.book_id) '
				.'LEFT JOIN authors a ON (ba.author_id = a.author_id) '
				.'WHERE book_title LIKE "%"');

		var_dump($sql);

		//$sql = ('SELECT book_id, title  FROM books ORDER BY book_id ASC');


		$result = $db->prepare($sql);

		$result->execute();

		$row  = $result->fetchAll(PDO::FETCH_ASSOC);


		foreach ($row as $item) {
			$productsList[] = $item;
			//$productsList['title'] = $item['title'];
		}
		var_dump($productsList);
//        $i = 0;
//        while ($row = $result->fetch()) {
//            $productsList[$i]['id'] = $row['id'];
//            $productsList[$i]['name'] = $row['name'];
//            $productsList[$i]['code'] = $row['code'];
//            $productsList[$i]['price'] = $row['price'];
//            $i++;
//        }
        return $productsList;
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
    public static function updateProductById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE product
            SET 
                name = :name, 
                code = :code, 
                price = :price, 
                category_id = :category_id, 
                brand = :brand, 
                availability = :availability, 
                description = :description, 
                is_new = :is_new, 
                is_recommended = :is_recommended, 
                status = :status
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }


	public static function checkAuthorExists($author_name)
	{
		// Соединение с БД
		$db = Db::getConnection();

		// Текст запроса к БД
		$sql = 'SELECT authors_lasname FROM authors WHERE author_lastname = :author_lastname';

		// Получение результатов. Используется подготовленный запрос
		$result = $db->prepare($sql);
		//$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->execute();

		if ($result->fetchColumn())
			return true;
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
		var_dump($options);

		$sql = 'INSERT INTO books (book_title) VALUES (:book_title)';
		$result = $db->prepare($sql);

        if ($result->execute([':book_title' => $options['book_title']])) {
            $last_book_id = $db->lastInsertId();
			var_dump($last_book_id);
        }

		$sql = 'INSERT INTO authors (author_lastname) VALUES (:author_lastname)';
		$result = $db->prepare($sql);
		$authors = explode(PHP_EOL, rtrim($options['authors'], PHP_EOL));
		//$authors = explode(PHP_EOL, $options['authors']);
		var_dump($authors);
		$authors_ids = [];
		//die();
		foreach ($authors as $item) {

			if ($result->execute([':author_lastname' => $item])) {

				$last_author_id = $db->lastInsertId();
				$authors_ids[] = $last_author_id;
				//var_dump($authors_ids);
			}

		}


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
