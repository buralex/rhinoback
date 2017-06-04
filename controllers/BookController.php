<?php

/**
 * Контроллер ProductController
 * Товар
 */
class BookController
{

    /**
     * Action для страницы просмотра товара
     * @param integer $productId <p>id товара</p>
     */
    public function actionView($bookId)
    {
        // Список категорий для левого меню
        //$categories = Category::getCategoriesList();

        // Получаем инфомрацию о товаре
        //$book = Book::getBookById($bookId);
        //var_dump($book);

        // Подключаем вид
        require_once ROOT . '/views/book/view.php';
        return true;
    }

}
