<?php
include_once("sqlite.php");

//テストデータ表示用
$testData = array();

if($_SESSION['visit'] == 1){

    try{
        $pathToTestDB = "../back/XSSPersistence/sqlitedb/testdb";

        //前回作成したデータベース削除
        if (file_exists($pathToTestDB)){
            unlink($pathToTestDB);
        }

        //データベース接続・作成
        $con = new SqliteConnect($pathToTestDB);

        //テスト用テーブル作成SQL
        $createSql ="
            CREATE TABLE SNS(
                ID          INT PRIMARY KEY   NOT NULL,
                PW          INT               NOT NULL,
                NAME        CHAR(50)          NOT NULL,
                DATE        DATE,
                CONTENT     TETXT
            );
        ";

        //テスト用データ作成SQL
        $createData = "
            INSERT INTO SNS (ID,PW,NAME,DATE,CONTENT)
            VALUES (1, 11, 'Paul', datetime('now'), 'Nice to meet you, my name is Paul. Thank you' );

            INSERT INTO SNS (ID,PW,NAME,DATE,CONTENT)
            VALUES (2, 22, 'Allen', datetime('now'), 'Hello poul Thank you for participating in the conversation' );
        ";

        //テスト用テーブル作成
        $con->execute($createSql);

        //テストデータ登録
        $con->execute( $createData);

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
    }
}