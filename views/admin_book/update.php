
<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Admin panel</a></li>
                    <li><a href="/admin/book">Managing books</a></li>
                    <li class="active">Edit a book</li>
                </ol>
            </div>


            <h4>Edit a book #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <h4>Book title</h4>
                        <input type="text" name="book_title" placeholder="" value="<?php echo $book['book_title']; ?>">
                        <br>
                        <h4>Authors</h4>

                        <h5>( fill in the authors beginning from a NEW LINE each !!! )</h5>
                        <textarea name="authors" placeholder="" rows="10" ><?php echo $authors_value; ?></textarea>
                        <br/><br/>
                        <input type="submit" name="submit" class="btn btn-default" value="Save">
                        
                        <br/><br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

