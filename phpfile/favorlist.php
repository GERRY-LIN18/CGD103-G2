<?php
session_start();
$Origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : "*";
// 如果$origin为*号时,则跨域访问不支持cookie的发送
header("Access-Control-Allow-Origin: {$Origin}");
// 允许请求的类型
header("Access-Control-Allow-Methods:POST,GET,OPTIONS");
// 跨域访问是否允许带cookie的发送
header("Access-Control-Allow-Credentials:true");
header("Content-Type:application/json;charset=UTF-8");
if (isset($_SESSION['member'])) {
    require_once("../connectBooks.php");
    $data = json_decode(file_get_contents('php://input'));
    $id = $_SESSION['member']['mem_id'];

    $sql = "SELECT collect_product.product_id, product.product_name,product.product_pic , product.unit_price
    FROM collect_product
    INNER JOIN product
    ON collect_product.product_id = product.product_id
    where collect_product.mem_id =$id;";

    $book = $pdo->query($sql);
    $books = $book->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($books);


} else {
    $msg = "請先登入";
    $result = ["msg" => $msg];
    echo json_encode($result);
}


?>