<?php
    header('Content-Type: text/html; charset=UTF-8');

class constants{
    
    const VULNERABILITY_LIST = array(
        "SQL インジェクション" => "SqlInjection",
        "OSコマンドインジェクション" => "OSCommandInjection",
        "クロスサイト・スクリプティング(反射型)" => "XSSReflective",
        "クロスサイト・スクリプティング(持続型)" => "XSSPersistence",
        "オープンリダイレクト" => "OpenRedirect",
        "リモートファイルインクルージョン" => "RemoteFileInclusion",
        "SSI インジェクション" => "SSIInjection",
        "Authenication Credentials" => "AuthenicationCredentials"
    );
}