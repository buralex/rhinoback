<?php include ROOT . '/views/layouts/header.php'; ?>

    <script>
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xhttp = new XMLHttpRequest();
                var formData = new FormData();
                var dataList = document.querySelector('.data-list');
                var typedText = document.querySelector('input[name="title"]').value;
                formData.append('title', typedText);

                xhttp.open("POST", "../../LibraryHint.php", true);

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
                        console.log(jsonOptions);
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

            <div class="col-lg-12 text-center">
                <img src="/template/images/schema.jpg" alt="">
                <h4>Введите название книги или автора</h4>
                <form action="" method="post">
                    <input type="text" name="title" onkeyup="showHint(this.value)" autocomplete="off">
                    <input type="submit" name="submit" class="btn btn-default" value=">>" />

<!--                    <input type="text" id="ajax" list="json-datalist" placeholder="e.g. datalist">-->
<!--                    <datalist id="json-datalist"></datalist>-->
                    <div class="data-list"></div>

                </form>
                <div id="txtHint"></div>
            </div>
        </div>
    </div>
</section>


<?php include ROOT . '/views/layouts/footer.php'; ?>