<?php include ROOT . '/views/layouts/header.php'; ?>

<script>
    function showHint(str) {
        if (str.length == 0) {
            document.querySelector(".data-list").innerHTML = "";
            return;
        } else {
            var xhttp = new XMLHttpRequest();
            var formData = new FormData();
            var dataList = document.querySelector('.data-list');
            var typedText = document.querySelector('input[name="book_title"]').value;
            formData.append('book_title', typedText);

            xhttp.open("POST", "../../BookHint.php", true);

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
//                    console.log(this.responseText);
                } else {
                    alert("Error! not sent!");
                }
            };

            xhttp.send(formData);
        }
    }

/*-----------------------------------------------------------------------------------------------*/


    

</script>
<section>
    <div class="container">

        <div class="row text-center">

            <a href=""></a><a href=""></a>

            <div class="col-lg-6 text-center">
                <h4>Input the name of the BOOK</h4>
                <input type="text" name="book_title" onkeyup="showHint(this.value)" autocomplete="off">
                <br><br>
                <div class="data-list"></div>
            </div>

            <div class="col-lg-6 text-center">
                <h4>Input the name of the AUTHOR</h4>
                <input type="text" name="author_name" onkeyup="showHintAuthor(this.value)" autocomplete="off">
                <br><br>
                <div class="data-list-author"></div>
            </div>
            <img src="/template/images/schema.jpg" alt="">
        </div>
    </div>
</section>

<script>
    function showHintAuthor(str) {
        if (str.length == 0) {
            document.querySelector(".data-list-author").innerHTML = "";
            return;
        } else {
            var xhttp = new XMLHttpRequest();
            var formData = new FormData();
            var dataList = document.querySelector('.data-list-author');
            var typedText = document.querySelector('input[name="author_name"]').value;
            formData.append('author_name', typedText);

            xhttp.open("POST", "../../AuthorHint.php", true);

            xhttp.onload = function(oEvent) {
                if (xhttp.status == 200) {

                    while (dataList.firstChild) {
                        dataList.removeChild(dataList.firstChild);
                    }
                    var resp = (this.responseText).substr(1);
                    var jsonOptions = JSON.parse(resp);

                    jsonOptions.forEach(function(item) {
                        // Create a new <option> element.
                        var option = document.createElement('a');
                        option.style.cssText = 'display: block;';
                        // Set the value using the item in the JSON array.
                        option.innerText = item.author_name;
                        option.href = "/author/" + item.author_id;
                        // Add the <option> element to the <datalist>.
                        dataList.appendChild(option);
                    });
                    console.log(jsonOptions);
                } else {
                    alert("Error! not sent!");
                }
            };
            xhttp.send(formData);
        }
    }
</script>


<?php include ROOT . '/views/layouts/footer.php'; ?>
