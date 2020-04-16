<?php
session_start();
include_once("sqlite.php");

//テストデータ表示用
$testData = array();


try{
    
    $pathToTestDB = "../back/SQLInjection/sqlitedb/testdb";

    //前回作成したデータベース削除
    if (file_exists($pathToTestDB)){
        unlink($pathToTestDB);
    }

    //データベース接続・作成
    $con = new SqliteConnect($pathToTestDB);

    //テスト用テーブル作成SQL
    $createSql ="
        CREATE TABLE COMPANY(
            ID          INT PRIMARY KEY   NOT NULL,
            PW          INT               NOT NULL,
            NAME        TEXT              NOT NULL,
            AGE         INT               NOT NULL,
            ADDRESS     CHAR(50),
            SALARY      REAL
        );
    ";

    //テスト用データ作成SQL
    $createData = "
        INSERT INTO COMPANY (ID,PW,NAME,AGE,ADDRESS,SALARY)
        VALUES (1, 11, 'Paul', 32, 'California', 20000.00 );
        
        INSERT INTO COMPANY (ID,PW,NAME,AGE,ADDRESS,SALARY)
        VALUES (2, 22, 'Allen', 25, 'Texas', 15000.00 );
        
        INSERT INTO COMPANY (ID,PW,NAME,AGE,ADDRESS,SALARY)
        VALUES (3, 33, 'Teddy', 23, 'Norway', 20000.00 );
        
        INSERT INTO COMPANY (ID,PW,NAME,AGE,ADDRESS,SALARY)
        VALUES (4, 44, 'Mark', 25, 'Rich-Mond ', 65000.00 );
        
        INSERT INTO COMPANY (ID,PW,NAME,AGE,ADDRESS,SALARY)
        VALUES (5, 55, 'David', 27, 'Texas', 85000.00 );
        
        INSERT INTO COMPANY (ID,PW,NAME,AGE,ADDRESS,SALARY)
        VALUES (6, 66, 'Kim', 22, 'South-Hall', 45000.00 );
    ";

    //テスト用テーブル作成
    $con->execute($createSql);

    //テストデータ登録
    $con->execute( $createData);

    //登録したデータ全取得
    $rec = new ResultSet( $con->select( "SELECT * FROM COMPANY") );

    //格納
    for( $i = 0 ; $i < $rec->getRowCount() ; $i += 1 ) {
        $testData[$rec->getField( 'ID' )] = array($rec->getField( 'PW' ),$rec->getField( 'NAME' ),$rec->getField( 'AGE' ),$rec->getField( 'ADDRESS' ),$rec->getField( 'SALARY' ));
        $rec->moveNext();
    }

    //SQLite切断
    $con->close();

} catch (Exception $e) {
    $dbErrorMsg = $e->getMessage();
}