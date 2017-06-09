
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
                        <form onsubmit="return false;" class="pure-form" method="post">
                            <input id="authorSearch" autofocus type="text" name="author_name" placeholder=" author name ..." autocomplete="off">
                        </form>
                        <br><br>
                        <p>books of the author:</p>
                        <div class="data-list"></div>
                        <div class="data-list-2"></div>
                    </div>
                </div><!--/product-details-->
            </div>
        </div>
    </div>
</section>