<?php
include_once("sqlite.php");

if(isset($_POST["user_id"]) && isset($_POST["user_pw"])){

    //テストデータ表示用
    $selectData = array();

    //データベース接続・作成
    $con = new SqliteConnect("../back/sqlitedb/testdb");

    //テスト用テーブル作成SQL
    $selectSql ="SELECT * FROM COMPANY WHERE ID=".$_POST["user_id"]." AND PW=".$_POST["user_pw"];


    //登録したデータ全取得
    $rec = new ResultSet( $con->select( $selectSql ) );

    //格納
    for( $i = 0 ; $i < $rec->getRowCount() ; $i += 1 ) {
        $selectData[$rec->getField( 'ID' )] = array($rec->getField( 'PW' ),$rec->getField( 'NAME' ),$rec->getField( 'AGE' ),$rec->getField( 'ADDRESS' ),$rec->getField( 'SALARY' ));
        $rec->moveNext();
    }

    //SQLite切断
    $con->close();
}