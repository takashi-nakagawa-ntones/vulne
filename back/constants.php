<?php
header('Content-Type: text/html; charset=UTF-8');

class constants{
    
    const VULNERABILITY_LIST = array(
        "SqlInjection"              => "SQL インジェクション",
        "OSCommandInjection"        => "OSコマンドインジェクション",
        "XSSReflective"             => "クロスサイト・スクリプティング(反射型)",
        "XSSPersistence"            => "クロスサイト・スクリプティング(持続型)",
        "OpenRedirect"              => "オープンリダイレクト",
        "RemoteFileInclusion"       => "リモートファイルインクルージョン",
        "SSIInjection"              => "SSI インジェクション",
        "AuthenicationCredentials"  => "Authenication Credentials"
    );

}