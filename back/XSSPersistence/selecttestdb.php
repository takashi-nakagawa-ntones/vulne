<?php
error_reporting(0);
include_once("sqlite.php");

if(isset($_POST["user_id"]) && isset($_POST["user_pw"]) && isset($_POST["user_name"]) && isset($_POST["user_content"])){

    try {
        //テストデータ表示用
        $selectData = array();

        //テスト用DBデータ 全量
        $testData = array();

        //DBエラーメッセージ
        $dbErrorMsg = "";
        
        //testdb へのパス
        $pathToTestDB = "../back/XSSPersistence/sqlitedb/testdb";

        //データベース接続・作成
        $con = new SqliteConnect($pathToTestDB);

        //テスト対象ユーザのレコード削除
        $deleteSql = "DELETE FROM SNS WHERE ID=".$_POST['user_id']." AND PW=".$_POST['user_pw'].";";
        
        //SQL実行
        $con->execute($deleteSql);

        //テスト用テーブル作成SQL
        $insertSql = "INSERT INTO SNS (ID,PW,NAME,DATE,CONTENT) VALUES(".$_POST['user_id'].",".$_POST['user_pw'].",'". $_POST['user_name']."',datetime('now'),'". $_POST['user_content']."')";

        //SQL実行
        $con->execute($insertSql);

        //登録したデータ全取得
        $rec = new ResultSet( $con->select( "SELECT * FROM SNS") );

        //格納
        for( $i = 0 ; $i < $rec->getRowCount() ; $i += 1 ) {
            $testData[$rec->getField( 'ID' )] = array($rec->getField( 'PW' ),$rec->getField( 'NAME' ),$rec->getField( 'DATE' ),$rec->getField( 'CONTENT' ));
            $rec->moveNext();
        }

        //SQLite切断
        $con->close();
    } catch (Exception $e) {
        $dbErrorMsg = $e->getMessage();
        echo $dbErrorMsg;
    }
}