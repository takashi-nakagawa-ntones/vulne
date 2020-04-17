<?php
$resultClMessage = "";
$resultSvMessage = "";

$resultUserName = "";

$scrollDown = false;

if($_SESSION['visit'] > 1){
    if(isset($_POST) && isset($_POST["mcode"])){
        switch($_POST['mcode']){
            case "1":
                $resultClMessage="<span class='text-primary'>想定したケースで入力値が送信されました</span>";
                $resultSvMessage = "<span class='text-primary'>ユーザー名「poul」をDB登録しました</span>";
                $resultUserName = "poul";
            break;
            case "2":
                $resultClMessage="<span class='text-danger'>※ユーザー名は表示されずSSIが実行されました</span>";
                $resultSvMessage="<span class='text-danger'>※攻撃者により//".$_SERVER['SERVER_NAME']."/front/backdoor.php <br>が作成されました</span>";
                touch("./backdoor.php");
                file_put_contents("./backdoor.php","<?php echo '▼攻撃者が設置したファイルにアクセスしています';phpinfo();");
            break;
            case "3":
                $resultClMessage="<span class='text-danger'>※ユーザー名は表示されずSSIが実行されました</span>";
                $resultSvMessage="<span class='text-danger'>※攻撃者により/var/log/httpd/access_log が削除されました</span>";
            break;
        }
    }
}
?>
