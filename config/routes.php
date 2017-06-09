<?php

return array(

	// User:
    'user/register' => 'user/register', // UserController -> actionRegister
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',


	//library
	'library/filtered' => 'library/filtered', // LibraryController -> actionFiltered
	'library/bookhint/(.+)' => 'library/bookhint/$1', // LibraryController -> actionBookHint
	'library/authorhint/(.+)' => 'library/authorHint/$1', // LibraryController -> actionAuthorHint

	'library/filterbooks/(.+)' => 'library/filterBooks/$1', // LibraryController -> actionFilterBooks
	'library/filterauthors/(.+)' => 'library/filterAuthors/$1', // LibraryController -> actionFilterAuthors

	'library/book/([0-9]+)' => 'library/showBook/$1', // LibraryController -> actionShowBook
	'library/author/([0-9]+)' => 'library/showAuthor/$1', // LibraryController -> actionShowAuthor
	'library' => 'library/index', // LibraryController -> actionIndex


	// Managing library:
	'admin/book/create' => 'adminBook/create', // AdminBookController -> actionCreate
	'admin/book/update/([0-9]+)' => 'adminBook/update/$1', // AdminBookController -> actionUpdate($1)
	'admin/book/delete/([0-9]+)' => 'adminBook/delete/$1', // AdminBookController -> actionDelete($1)
	'admin/book' => 'adminBook/index', // AdminBookController -> actionIndex

	// Admin panel:
	'admin' => 'admin/index',

	'reverse' => 'site/reverse',

	'extract' => 'site/extract',

    // Main page
    'index.php' => 'site/index', // SiteController -> actionIndex
    '' => 'site/index', // SiteController -> actionIndex
);
