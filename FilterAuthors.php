<?php

define('ROOTPATH', str_replace("\\","/", __DIR__));
include_once ROOTPATH . '/components/Autoload.php';define('ROOT', str_replace("\\","/", __DIR__));
include_once ROOTPATH . '/components/Autoload.php';

$db = Db::getConnection();

$hint = "";

//selects all of the authors by the book title
$sql = ('SELECT a.author_id, author_name '
	.'FROM books b LEFT JOIN books_authors ba '
	.'ON (b.book_id = ba.book_id) '
	.'LEFT JOIN authors a ON (ba.author_id = a.author_id) '
	.'WHERE book_title LIKE ?');

$result = $db->prepare($sql);

$param = $_POST['book_title']; // search text - to param

if ($result->execute(["%$param%"])) {

	$row  = $result->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($row);
}