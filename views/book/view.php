<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->

                    <div class="col-sm-6">
                        <br/>
                        <h5>Title of the book</h5>
                        <h1><?php echo $book['book_title']; ?></h1>
                        <p><span class="warn">written by: </span><?= implode(", ",$authors_str); ?></p>


                    </div>

                    <div class="col-sm-6 text-center">
                        <h4>Input AUTHOR name</h4>
                        <input type="text" name="author_name" placeholder=" author name" autocomplete="off">
                        <p class="author-hint"></p>

                        <p>books of the author:</p>
                        <div class="data-list"></div>
                        <div class="data-list-2"></div>
                    </div>
                </div><!--/product-details-->
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelector('input[name="author_name"]').addEventListener("keyup", function(e) {
        var params = {
            dataList: '.data-list',
            input: 'input[name="author_name"]',
            path: '../../FilterBooks.php',
            tag: 'a',
            linkClass: 'link-library',
            href: '/book/',
            linkText: 'book_title',
            linkID: 'book_id'
        };
        showHint(params);
    });

    document.querySelector('input[name="author_name"]').addEventListener("keyup", function(e) {
        var params = {
            dataList: '.author-hint',
            input: 'input[name="author_name"]',
            path: '../../AuthorHint.php',
            tag: 'span',
            linkClass: 'hint-library',
            href: '/author/',
            linkText: 'author_name',
            linkID: 'author_id'
        };
        showHint(params);
    });
</script>

<?php include ROOT . '/views/layouts/footer.php'; ?>