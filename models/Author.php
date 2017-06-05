<?php

class Author
{


    public static function getAuthorById($id)
    {
		$db = Db::getConnection();

		$sql = 'SELECT author_name FROM authors WHERE author_id = :author_id';

		// Используется подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':author_id', $id, PDO::PARAM_INT);

		// Указываем, что хотим получить данные в виде массива
		$result->setFetchMode(PDO::FETCH_ASSOC);

		// Выполнение коменды
		$result->execute();

		// Получение и возврат результатов
		return $result->fetch();
    }

}
