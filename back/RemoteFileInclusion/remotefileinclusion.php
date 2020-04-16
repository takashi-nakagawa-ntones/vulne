<?php

$fileContent = "";

$resultMessage = "";

$resultSvMessage = "";

$includeFilePath = "";

if($_SESSION['visit'] > 1){
    if(isset($_POST) && isset($_POST["mcode"]) && isset($_GET) && isset($_GET["page"])){
        
        $includeFilePath = $_GET["page"];

        switch($_POST['mcode']){
            case "1":
                $resultMessage="<span class='text-primary'>想定されたファイルがインクルードされました</span>";
                $fileContent = "<?php $content = '画面表示の一部' ?>";
            break;
            case "2":
                $resultMessage="<span class='text-danger'>システム情報取得スクリプトが実行されました</span>";
                $fileContent = "<?php phpinfo(); ?>";
            break;
            case "3":
                $resultMessage="<span class='text-danger'>Webページが改竄されました</span>";
            break;
            case "4":
                $resultMessage="<span class='text-danger'>個人情報取得スクリプトが実行されました</span>";
            break;
        }
    }
}