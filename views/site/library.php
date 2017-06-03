<?php include ROOT . '/views/layouts/header.php'; ?>

    <script>
        function showHint() {
            if (false) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xhttp = new XMLHttpRequest();
                var formData = new FormData();

                var typedText = document.querySelector('input[name="title"]').value;
                formData.append('title', typedText);

                xhttp.open("POST", "../../components/LibrarySearch.php", true);

                xhttp.onload = function(oEvent) {
                    if (xhttp.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
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
                    <input type="text" name="title" onkeyup="showHint()" autocomplete="off">
<!--                    <input type="text" name="search_field"  class=".search-field">-->
                </form>
                <p>Suggestions: <span id="txtHint"></span></p>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>