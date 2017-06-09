
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
                        <form id="bookAuthors" class="pure-form" method="post">
                            <input id="bookSearch" autofocus type="text" name="book_title" placeholder=" author name ..." autocomplete="off">
                            <input type="submit" name="submit" class="btn btn-default" value="GO" />
                        </form>
                        <br><br>
                        <p>authors of the book:</p>
                        <div class="data-list-author"></div>
                    </div>

                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>