
<?php
    session_start();
    // //跨域(正式開發不能這樣)
    header('Access-Control-Allow-Origin:*');
    header("Content-Type:application/json;charset=utf-8");
try {
    var_dump($_POST);
    require_once("../connectBooks.php");
    $sql = "select * from `member` where mem_mail=:mem_mail and mem_pwd=:mem_pwd";
    $errMsg = "";

    if (isset($_POST['mem_mail']) && isset($_POST['mem_pwd'])) {
        // 使用表單數據
        $mem_mail = $_POST['mem_mail'];
        $mem_pwd = $_POST['mem_pwd'];

        $member = $pdo->prepare( $sql ); //先編譯好
        $member->bindValue(":mem_mail", $mem_mail); //代入資料
        $member->bindValue(":mem_pwd", $mem_pwd);
        $member->execute();//執行之
        if ($member->errorInfo()[0] != '00000') {
            // 錯誤處理
            $errMsg .= "錯誤 : " . $member->errorInfo()[2] . "<br>";
        }

        if( $member->rowCount() == 0 ){//登入失敗
            $errMsg .= "用戶帳號或密碼錯誤請重新登入<br>";
        }else{ //登入成功,
            //自資料庫中取回資料
            $memRow = $member->fetch(PDO::FETCH_ASSOC);
    
            //將登入者的資料寫入session
            $_SESSION['member'] = $memRow;
    
            //送出登入者的資料
            // $result = ["memNo"=>$_SESSION["memNo"], "memId"=>$_SESSION["memId"],"memName"=>$_SESSION["memName"],"email"=>$_SESSION["email"]];
            // echo json_encode($result);
    
            // 設定回應的 HTTP 標頭
            // header('Content-Type: application/json');
            // 將會員資料輸出為 JSON 格式
            echo json_encode($memRow);
    
            header('Location: /MyPage'); // 自動跳轉至會員頁
            exit;
        }
    } else {
        // 表單未提交或缺少必填字段
        echo "表單未提交或缺少必填字段";
    }
  
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo json_encode($errMsg);
}
?> 



<!-- 使用 filter_input 函數來確保輸入資料的安全性。
$mem_mail = filter_input(INPUT_POST, 'mem_mail', FILTER_SANITIZE_EMAIL);
這樣可以過濾掉不合法的電子郵件格式。 -->