
<section>
    <div class="container">
        <div class="row text-center">

            <div class="link-to-filter">
                <a href="/library/filtered" >
                    <p>Filter books</p>
                    <p>by quantity of authors</p>
                </a>
            </div>

            <div class="col-lg-5 text-center">
                <h4>BOOKS</h4>

                <form action=" " class="pure-form" method="post">
                    <input id="bookSearch" autofocus type="text" name="book_title" placeholder=" book title ..." autocomplete="off">
                    <input type="submit" name="submit" class="btn btn-default" value="GO" />
                </form>
                <br>
                <table class="table-bordered table-striped table text-left">
                    <tr>
                        <th class="text-center">Book title</th>
                    </tr>
					<?php foreach ($books as $book): ?>
                        <tr>
                            <td><a href="/library/book/<?= $book['book_id'] ?>"><?= $book['book_title']; ?></a></td>
                        </tr>
					<?php endforeach; ?>
                </table>
            </div>

            <div class="col-lg-2"></div>

            <div class="col-lg-5 text-center">
                <h4>AUTHORS</h4>

                <form action=" " class="pure-form" method="post">
                    <input id="authorSearch" autofocus type="text" name="author_name" placeholder=" author name ..." autocomplete="off">
                    <input type="submit" name="submit" class="btn btn-default" value="GO" />
                </form>
                <br>
                <table class="table-bordered table-striped table text-left">
                    <tr>
                        <th class="text-center">Author name</th>
                    </tr>
					<?php foreach ($authors as $author): ?>
                        <tr>
                            <td><a href="/library/author/<?= $author['author_id'] ?>"><?= $author['author_name']; ?></a></td>
                        </tr>
					<?php endforeach; ?>
                </table>
            </div>

        </div>


    </div>
</section>
