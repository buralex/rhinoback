'use strict';

/*--------------------------------------------------------
        SHOW HINTS when searching
--------------------------------------------------------*/

function showHint(params) {
    var xhttp = new XMLHttpRequest();
    var formData = new FormData();
    var dataList = document.querySelector(params.dataList);
    var input = document.querySelector(params.input);

    if (input.value.length == 0) {
        dataList.innerHTML = "";
        return;
    } else {
        formData.append(input.name, input.value);

        xhttp.open("POST", params.path, true);

        xhttp.onload = function(oEvent) {
            if (xhttp.status == 200) {

                while (dataList.firstChild) {
                    dataList.removeChild(dataList.firstChild);
                }

                var jsonOptions = JSON.parse(this.responseText);
                jsonOptions.forEach(function(item) {

                    var link = document.createElement(params.tag);
                    link.innerText = item[params.linkText];
                    link.href = params.href + item[params.linkID];
                    link.className = params.linkClass;

                    dataList.appendChild(link);
                });
            } else {
                alert("Error! not sent!");
            }
        };
        xhttp.send(formData);
    }
}
