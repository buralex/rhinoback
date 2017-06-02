<?php include ROOT . '/views/layouts/header.php'; ?>


<section>
    <div class="container">
        <div class="row">

            <div class="col-lg-12 text-center">
                <h4>Введите название книги или автора</h4>
                <form action="" method="post">
                    <input type="text" name="search_field"  class=".search-field">
                </form>
                <p>Suggestions: <span id="txtHint"><?= $hint ?></span></p>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>