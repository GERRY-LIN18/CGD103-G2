<?php
// //跨域(正式開發不能這樣)
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../connectBooks.php");
$memId = $_REQUEST['mem_id'];

$sql = "SELECT * FROM appointment WHERE mem_id = $memId  ORDER BY appointment_date DESC ;";
$book = $pdo->query($sql);
$books = $book->fetchAll();
$data = [];
foreach ($books as $i => $page) {
    $data[] = $page;
}
echo json_encode($data);
?>