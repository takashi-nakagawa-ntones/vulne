<?php

$resultMessage = "";

if($_SESSION['visit'] > 1){
    if(isset($_POST) && isset($_POST["mcode"])){
        switch($_POST['mcode']){
            case "1":
                $resultMessage="<span class='text-primary'>正常にログイン完了。対象者のアカウント情報が表示されました</span>";
                $scrollDown = true;
            break;
            case "2":
                $resultMessage="<span class='text-danger'>認証を回避して、管理者としてログインできたため、全データが閲覧可能となりました</span>";
                $scrollDown = true;
            break;
        }
    }
}

