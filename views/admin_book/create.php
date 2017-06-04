<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>


            <h3>Add a new book</h3>

            <br/>
			<?php if (isset($errors) && is_array($errors)): ?>
                <ul>
					<?php foreach ($errors as $error): ?>
                        <li><h2>Error!!!</h2> - <?php echo $error; ?></li>
					<?php endforeach; ?>
                </ul>
			<?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <h4>Book title</h4>
                        <input type="text" name="book_title" placeholder="" value="">
                        <br>
                        <h4>Authors</h4>

                        <h5>( fill in the authors beginning from a NEW LINE each !!! )</h5>
                        <textarea name="authors" placeholder="" rows="10"></textarea>
                        <br/><br/>
                        <input type="submit" name="submit" class="btn btn-default" value="Save">

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

