'use strict';

    /**
     * Sends search text via ajax
     * @param params ()
     * path
     * searchText
     * responseFnc (for autocomplete)
     */
    var sendSearchText = function(params) {
        var xhttp = new XMLHttpRequest();

        xhttp.open("POST", params.path + params.searchText, true);

        xhttp.onload = function (oEvent) {
            if (xhttp.status == 200) {
                params.responseFnc(this.responseText);
            } else {
                throw new Error("Error! not sent!");
            }
        };
        xhttp.send();
    };

    /*-----------------------------------------------------------
     Autocomplete for book
     ------------------------------------------------------------*/
    var searchBook = new autoComplete({
        selector: '#bookSearch',
        minChars: 1,
        source: function(searchText, response) {
            var params = {
                path: '/library/bookhint/',
                searchText: searchText,
                responseFnc: function(resp) {

                    var jsonOptions = JSON.parse(resp);
                    response(jsonOptions);
                }
            };
            sendSearchText(params);
        }
    });

    /*-----------------------------------------------------------
     Autocomplete for author
     ------------------------------------------------------------*/
    var searchAuthor = new autoComplete({
        selector: '#authorSearch',
        minChars: 1,
        source: function(searchText, response) {
            var params = {
                path: '/library/authorhint/',
                searchText: searchText,
                responseFnc: function(resp) {

                    var jsonOptions = JSON.parse(resp);
                    response(jsonOptions);
                }
            };
            sendSearchText(params);
        }
    });

/*--------------------------------------------------------
        SHOW HINTS when searching
--------------------------------------------------------*/

function showHint(params) {
    var xhttp = new XMLHttpRequest();
    var dataList = document.querySelector(params.dataList);
    var input = document.querySelector(params.input);

    if (input.value.length == 0) {
        dataList.innerHTML = "";
        return;
    } else {
        xhttp.open("POST", params.path + input.value, true);

        xhttp.onload = function(oEvent) {
            if (xhttp.status == 200) {
                console.log(this.responseText);
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
        xhttp.send();

    }
}
