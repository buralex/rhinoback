
<section>
    <div class="container">
        <div class="row text-center">

        <h1>Filtered books</h1>
        <p>written by at least 3 writers and more</p>

			<?php foreach ($books as $book): ?>
                <p>
                    <a href="/library/book/<?= $book['book_id']; ?>">
						<?= $book['book_title']; ?>
                    </a>
                </p>
			<?php endforeach; ?>

        </div>
        <div class="db-logic-wrap">
            <img class="db-logic" src="/template/images/schema.jpg" alt="">
        </div>
    </div>
</section>
