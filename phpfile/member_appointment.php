<?php
session_start();
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=UTF-8");
$errMsg = "";
try {
    if (isset($_SESSION['member'])) { // 若會員已登入
        // 取得已登入會員 member 身形 body、訂閱訂單 vip_orders ;
        require_once("../connectBooks.php");
        $sql = "SELECT a.* from appointment a LEFT JOIN member m on(a.mem_id = m.mem_id)
        WHERE a.mem_id=:mem_id;";
        $member_id = $_SESSION['member']['mem_id']; // 抓出 SESSION 中已登入者的 mem_id
        $appointment = $pdo->prepare($sql); //先編譯好
        $appointment->bindValue(":mem_id", $member_id); //代入資料
        $appointment->execute(); //執行之
        $appointmentRow = $appointment->fetch(PDO::FETCH_ASSOC);
        echo json_encode($appointmentRow);
    }
    else{//尚未登入，
        $errMsg .= "請先登入";
        echo json_encode(["msg"=>$errMsg]);
    }
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo json_encode(["msg"=>$errMsg]);
}
?>
