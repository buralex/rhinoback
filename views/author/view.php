<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->

                    <div class="col-sm-6">
                        <br/>
                        <h5>Author name</h5>
                        <h1><?php echo $author['author_name']; ?></h1>
                        <p><span class="warn">wrote next books:</span> <?= implode(", ",$books_str); ?></p>
                    </div>

                    <div class="col-sm-6 text-center">
                        <h4>Input BOOK title</h4>
                        <input type="text" name="book_title" placeholder=" book title" autocomplete="off">
                        <p class="book-hint"></p>

                        <p>authors of the book:</p>
                        <div class="data-list-author"></div>
                    </div>

                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>

<script>
    document.querySelector('input[name="book_title"]').addEventListener("keyup", function(e) {
        var params = {
            dataList: '.data-list-author',
            input: 'input[name="book_title"]',
            path: '../../FilterAuthors.php',
            tag: 'a',
            linkClass: 'link-library',
            href: '/author/',
            linkText: 'author_name',
            linkID: 'author_id'
        };
        showHint(params);
    });
    /*------------------------------------------------------------------------------------------------*/
    document.querySelector('input[name="book_title"]').addEventListener("keyup", function(e) {
        var params = {
            dataList: '.book-hint',
            input: 'input[name="book_title"]',
            path: '../../BookHint.php',
            tag: 'span',
            linkClass: 'hint-library',
            href: '/book/',
            linkText: 'book_title',
            linkID: 'book_id'
        };
        showHint(params);
    });
</script>

<?php include ROOT . '/views/layouts/footer.php'; ?>