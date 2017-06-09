
<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Admin panel</a></li>
                    <li><a href="/admin/product">Managing books</a></li>
                    <li class="active">Delete this book</li>
                </ol>
            </div>


            <h4>Delete this book #<?php echo $book['book_title']; ?></h4>

            <p>Are you sure about that?</p>

            <form method="post">
                <input type="submit" name="submit" value="Delete" />
            </form>

        </div>
    </div>
</section>