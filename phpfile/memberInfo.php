<?php
    session_start();
    $Origin = isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:"*"; 
    // 如果$origin为*号时,则跨域访问不支持cookie的发送
    header("Access-Control-Allow-Origin: {$Origin}");           
    // 允许请求的类型
    header("Access-Control-Allow-Methods:POST,GET,OPTIONS");    
    // 跨域访问是否允许带cookie的发送
    header("Access-Control-Allow-Credentials:true");
    header("Content-Type:application/json;charset=UTF-8");
$errMsg = "";
try {
    if (isset($_SESSION['member']['mem_id'])) { // 若會員已登入
        // 取得已登入會員 member 身形 body、訂閱訂單 vip_orders ;
        require_once("../connectBooks.php");
        $sql = "SELECT m.* , b.* ,v.* from member m JOIN body b on(m.body_id = b.body_id)
                                    LEFT JOIN vip_orders v on(m.mem_id = v.mem_id)
        where m.mem_id=:mem_id;";
        $member_id = $_SESSION['member']['mem_id']; // 抓出 SESSION 中已登入者的 mem_id
        $member = $pdo->prepare($sql);
        $member->bindValue(":mem_id", $member_id);
        $member->execute();
        $memberRow = $member->fetch(PDO::FETCH_ASSOC);
        echo json_encode($memberRow);
        
    } else{//尚未登入，
        $errMsg .= "請先登入";
        echo json_encode(["msg"=>$errMsg]);
    }
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo json_encode(["msg"=>$errMsg]);
}
?>

