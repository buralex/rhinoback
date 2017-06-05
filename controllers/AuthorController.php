<?php

/**
 * Контроллер ProductController
 * Товар
 */
class AuthorController
{


    public function actionView($authorId)
    {
        // Список категорий для левого меню
        //$categories = Category::getCategoriesList();

        // Получаем инфомрацию о товаре
        $author = Author::getAuthorById($authorId);
        //var_dump($book);

        // Подключаем вид
        require_once ROOT . '/views/author/view.php';
        return true;
    }

}
