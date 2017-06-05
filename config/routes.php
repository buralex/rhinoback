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
	'library' => 'library/index', // LibraryController -> actionIndex


	// Book:
	'book/([0-9]+)' => 'book/view/$1', // BookController -> actionView($1)
	'author/([0-9]+)' => 'author/view/$1', // BookController -> actionView($1)

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
