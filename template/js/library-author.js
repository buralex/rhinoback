'use strict';

/*--------------------------------------------------------
        SHOW HINTS when searching
--------------------------------------------------------*/
(function() {

/*-----------------------------------------------------------
 Filtering authors by book
 ------------------------------------------------------------*/
    document.querySelector('#bookAuthors').addEventListener("submit", function(e) {
        var params = {
            dataList: '.data-list-author',
            input: 'input[name="book_title"]',
            path: '/library/filterauthors/',
            tag: 'a',
            linkClass: 'link-library',
            href: '/library/author/',
            linkText: 'author_name',
            linkID: 'author_id'
        };
        showHint(params); // function in main.js
        e.preventDefault();
    });

})();

