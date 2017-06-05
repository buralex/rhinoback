<?php include ROOT . '/views/layouts/header.php'; ?>

<script>
    function showBooks(str) {
        if (str.length == 0) {
            document.querySelector(".data-list").innerHTML = "";
            return;
        } else {
            var xhttp = new XMLHttpRequest();
            var formData = new FormData();
            var dataList = document.querySelector('.data-list');

            formData.append('author_name', str);

            xhttp.open("POST", "../../FilterBooks.php", true);

            xhttp.onload = function(oEvent) {
                if (xhttp.status == 200) {

                    while (dataList.firstChild) {
                        dataList.removeChild(dataList.firstChild);
                    }
                    var jsonOptions = JSON.parse(this.responseText);

                    jsonOptions.forEach(function(item) {
                        // Create a new <option> element.
                        var option = document.createElement('a');
                        option.style.cssText = 'display: block;';
                        // Set the value using the item in the JSON array.
                        option.innerText = item.book_title;
                        option.href = "/book/" + item.book_id;
                        // Add the <option> element to the <datalist>.
                        dataList.appendChild(option);
                    });

                } else {
                    alert("Error! not sent!");
                }
            };

            xhttp.send(formData);
        }
    }
</script>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->

                    <div class="col-sm-6">
                        <br/>
                        <h5>Title of the book</h5>
                        <h1><?php echo $book['book_title']; ?></h1>
                    </div>

                    <div class="col-sm-6 text-center">
                        <h4>Input the name of the AUTHOR</h4>
                        <input type="text" name="author_name" onkeyup="showBooks(this.value)" autocomplete="off">
                        <br><br>
                        <div class="data-list"></div>
                    </div>
                </div><!--/product-details-->
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>