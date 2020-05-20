<?php

$resultMessage = "";

if($_SESSION['visit'] > 1){
    if(isset($_POST) && isset($_POST["mcode"])){
        switch($_POST['mcode']){
            case "1":
                $resultMessage="<span class='text-primary'>想定されたURLにアクセスしました</span>";
            break;
            case "2":
                $resultMessage="<span class='text-danger'>GETパラメータに上の偽情報が埋めこれました。</span>";
            break;
            case "3":
                $resultMessage="<span class='text-danger'>GETパラメータにコピーサイトへ遷移するスクリプトが埋め込まれました。</span>";
            break;
        }
    }
}