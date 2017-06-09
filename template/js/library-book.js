'use strict';

(function() {

/*-----------------------------------------------------------
    Filtering books by author
 ------------------------------------------------------------*/
    document.querySelector('#authorBooks').addEventListener("submit", function(e) {
        var params = {
            dataList: '.data-list',
            input: 'input[name="author_name"]',
            path: '/library/filterbooks/',
            tag: 'a',
            linkClass: 'link-library',
            href: '/library/book/',
            linkText: 'book_title',
            linkID: 'book_id'
        };
        showHint(params); // function in main.js
        e.preventDefault();
    });

})();

