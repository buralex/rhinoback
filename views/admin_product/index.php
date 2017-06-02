<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление книгами</li>
                </ol>
            </div>

            <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить Книгу</a>
            
            <h4>Список Книг</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID книги</th>
                    <th>Название книги</th>
                    <th>Авторы</th>
                    <th></th>
                </tr>
                <?php foreach ($productsList as $product): ?>
                    <tr>
<!--                        <td>--><?php //echo $product['book_id']; ?><!--</td>-->
<!--                        <td>--><?php //echo $product['title']; ?><!--</td>-->
<!--                        <td>--><?php //echo $product['title']; ?><!--</td>-->
<!--                        <td><a href="/admin/product/update/--><?php //echo $product['title']; ?><!--" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>-->
                        <td><a href="/admin/product/delete/<?php echo $product['book_id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

