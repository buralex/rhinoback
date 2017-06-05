<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">

        <div class="row text-center">
            <a href="/library/filtered" >
                <div class="link-to-filter">
                    <p>Filter books</p>
                    <p>by quantity of authors</p>
                </div>
            </a>

            <div class="col-lg-6 text-center">
                <h4>search the BOOK</h4>
                <input type="text" name="book_title" placeholder=" book title" autocomplete="off">
                <br><br>
                <div class="data-list"></div>
            </div>

            <div class="col-lg-6 text-center">
                <h4>search the AUTHOR</h4>
                <input type="text" name="author_name" placeholder=" author name" autocomplete="off">
                <br><br>
                <div class="data-list-author"></div>
            </div>
        </div>
    </div>
</section>

<script>
    /*-----------------------------------------------------------------------------------------------*/
    document.querySelector('input[name="book_title"]').addEventListener("keyup", function(e) {
        var params = {
            dataList: '.data-list',
            input: 'input[name="book_title"]',
            path: '../../BookHint.php',
            tag: 'a',
            linkClass: 'link-library',
            href: '/book/',
            linkText: 'book_title',
            linkID: 'book_id'
        };
        showHint(params);
    });
    /*-----------------------------------------------------------------------------------------------*/
    document.querySelector('input[name="author_name"]').addEventListener("keyup", function(e) {
        var params = {
            dataList: '.data-list-author',
            input: 'input[name="author_name"]',
            path: '../../AuthorHint.php',
            tag: 'a',
            linkClass: 'link-library',
            href: '/author/',
            linkText: 'author_name',
            linkID: 'author_id'
        };
        showHint(params);
    });

</script>

<?php include ROOT . '/views/layouts/footer.php'; ?>
