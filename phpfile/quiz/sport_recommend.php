<?php
// 跨域
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("../../connectBooks.php");

$sql = "select * from product where style_type LIKE ('%運動風%') && length(product_pic) < 13 limit 4; ";
$book = $pdo->query($sql);
$books = $book->fetchALL(PDO::FETCH_ASSOC);
$data = [];
foreach ($books as $i => $page) {
    $data[] = $page;
}
echo json_encode($data);
?>