<?php

define('ROOTPATH', str_replace("\\","/", __DIR__));
include_once ROOTPATH . '/components/Autoload.php';define('ROOT', str_replace("\\","/", __DIR__));
include_once ROOTPATH . '/components/Autoload.php';

$db = Db::getConnection();

$hint = "";

$sql = 'SELECT * FROM books WHERE book_title LIKE ?';
$result = $db->prepare($sql);

$param = $_POST['book_title']; // search text - to param

if ($result->execute(["%$param%"])) {

	$row  = $result->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($row);
}