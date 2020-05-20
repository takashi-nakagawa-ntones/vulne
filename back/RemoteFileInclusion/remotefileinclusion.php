<?php

include("createtestdb.php");

$fileContent = "";

$resultMessage = "";

$resultSvMessage = "";

$scrollDown = false;

if($_SESSION['visit'] > 1){
    if(isset($_POST) && isset($_POST["mcode"]) && isset($_GET) && isset($_GET["page"])){
        
        $resultSvMessage = "include('".$_GET["page"]."');";

        switch($_POST['mcode']){
            case "1":
                $resultMessage="<span class='text-primary'>想定されたファイルがインクルードされました<br>表示されても問題ない内容です</span><br>";
                $fileContent = "&lt;?php \$content = 'This is a test' ?&gt;";
            break;
            case "2":
                $resultMessage="<span class='text-danger'>システム情報取得スクリプトが実行され、画面上部にPHP設定情報が表示されてしまいました</span>";
                $fileContent = "&lt;?php phpinfo(); ?&gt;";
                $scrollDown = true;
                include("./sub/systeminfo.php");
            break;
            case "3":
                $resultMessage="<span class='text-danger'>攻撃者が指定するファイルをインクルードし、画面上部に偽情報「Congratulations」が表示されてしまいました</span>";
                $fileContent = "&lt;html&gt;&lt;head&gt;&lt;title&gt;None&lt;/title&gt;&lt;/head&gt;&lt;body&gt;&lt;div class='card bg-info'&gt;&lt;div class='card-body text-light'&gt;&lt;h4 class='card-title'&gt;Congratulations&lt;/h4&gt;&lt;h6 class='card-subtitle mb-2 text-muted'&gt;Your 100th post&lt;/h6&gt;&lt;p class='card-text'&gt;We will give you a prize of $10000&lt;/p&gt;&lt;a href='#!' class='card-link'&gt;Click here for details&lt;/a&gt;&lt;/div&gt;&lt;/div&gt;&lt;/body&gt;&lt;html&gt;";
                $scrollDown = true;
                include("./sub/falsification.php");
            break;
            case "4":
                $resultMessage="<span class='text-danger'>個人情報取得スクリプトが実行され、画面上部に全ての登録データが表示されてしまいました<br></span>";
                $fileContent = "\$parsonalData = array();
                \$pathToTestDB = './../back/RemoteFileInclusion/sqlitedb/testdb';
                \$con = new SqliteConnect(\$pathToTestDB);
                \$rec = new ResultSet( \$con->select( 'SELECT * FROM COMPANY') );
                for( \$i = 0 ; \$i < \$rec->getRowCount() ; \$i += 1 ) {
                    \$parsonalData[\$rec->getField( 'ID' )] = array(\$rec->getField( 'PW' ),\$rec->getField( 'NAME' ),\$rec->getField( 'AGE' ),\$rec->getField( 'ADDRESS' ),\$rec->getField( 'SALARY' ));
                    \$rec->moveNext();
                }
                \$con->close();
                var_dump(\$parsonalData);";
                $scrollDown = true;
                include("./sub/parsonaldata.php");

            break;
        }
    }
}
