<?php
error_reporting(0);
include_once("sqlite.php");

//テストデータ表示用
$selectData = array();

//テスト用DBデータ 全量
$testData = array();

//DBエラーメッセージ
$dbErrorMsg = "";

//testdbへのパス
$pathToTestDB = "../back/SQLInjection/sqlitedb/testdb";

//データベース接続・作成
$con = new SqliteConnect($pathToTestDB);

//登録したデータ全取得
$rec = new ResultSet( $con->select( "SELECT * FROM COMPANY") );

//格納
for( $i = 0 ; $i < $rec->getRowCount() ; $i += 1 ) {
    $testData[$rec->getField( 'ID' )] = array($rec->getField( 'PW' ),$rec->getField( 'NAME' ),$rec->getField( 'AGE' ),$rec->getField( 'ADDRESS' ),$rec->getField( 'SALARY' ));
    $rec->moveNext();
}

//SQLite切断
$con->close();

if($_COOKIE["User"] == "Admin" && $_COOKIE["loggedin"] == "true"){

    $selectData = $testData;

}else if(isset($_POST["user_id"]) && isset($_POST["user_pw"])){

    try {

        //データベース接続・作成
        $con = new SqliteConnect($pathToTestDB);

        //テスト用テーブル作成SQL
        $selectSql ="SELECT * FROM COMPANY WHERE ID=".$_POST["user_id"]." AND PW=".$_POST["user_pw"];

        //SQL実行
        $con->execute($selectSql);

        //登録したデータ全取得
        $rec = new ResultSet( $con->select( $selectSql ) );

        //格納
        for( $i = 0 ; $i < $rec->getRowCount() ; $i += 1 ) {
            $selectData[$rec->getField( 'ID' )] = array($rec->getField( 'PW' ),$rec->getField( 'NAME' ),$rec->getField( 'AGE' ),$rec->getField( 'ADDRESS' ),$rec->getField( 'SALARY' ));
            $rec->moveNext();
        }

        //SQLite切断
        $con->close();
    } catch (Exception $e) {
        $dbErrorMsg = $e->getMessage();
    }
}