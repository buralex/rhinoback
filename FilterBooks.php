<?php

define('ROOTPATH', str_replace("\\","/", __DIR__));
include_once ROOTPATH . '/components/Autoload.php';define('ROOT', str_replace("\\","/", __DIR__));
include_once ROOTPATH . '/components/Autoload.php';

$db = Db::getConnection();

$hint = "";

$sql = ('SELECT book_title, b.book_id '
	.'FROM books b LEFT JOIN books_authors ba '
	.'ON (b.book_id = ba.book_id) '
	.'LEFT JOIN authors a ON (ba.author_id = a.author_id) '
	.'WHERE author_name LIKE ?');

$result = $db->prepare($sql);

$param = $_POST['author_name']; // search text - to param

if ($result->execute(["%$param%"])) {

	$row  = $result->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($row);
}