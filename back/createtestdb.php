<?php
include_once("sqlite.php");


//テストデータ表示用
$testData = array();

//前回作成したデータベース削除
unlink("../back/sqlitedb/testdb");

//データベース接続・作成
$con = new SqliteConnect("../back/sqlitedb/testdb");

//テスト用テーブル作成SQL
$createSql ="
    CREATE TABLE COMPANY(
        ID INT PRIMARY KEY     NOT NULL,
        NAME           TEXT    NOT NULL,
        AGE            INT     NOT NULL,
        ADDRESS        CHAR(50),
        SALARY         REAL
    );
 ";

//テスト用データ作成SQL
 $createData = "
    INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
    VALUES (1, 'Paul', 32, 'California', 20000.00 );
    
    INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
    VALUES (2, 'Allen', 25, 'Texas', 15000.00 );
    
    INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
    VALUES (3, 'Teddy', 23, 'Norway', 20000.00 );
    
    INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
    VALUES (4, 'Mark', 25, 'Rich-Mond ', 65000.00 );
    
    INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
    VALUES (5, 'David', 27, 'Texas', 85000.00 );
    
    INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
    VALUES (6, 'Kim', 22, 'South-Hall', 45000.00 );
 ";

//テスト用テーブル作成
$con->execute($createSql);

//テストデータ登録
$con->execute( $createData);

//登録したデータ全取得
$rec = new ResultSet( $con->select( "SELECT * FROM COMPANY") );

//格納
for( $i = 0 ; $i < $rec->getRowCount() ; $i += 1 ) {
    $testData[$rec->getField( 'ID' )] = array($rec->getField( 'NAME' ),$rec->getField( 'AGE' ),$rec->getField( 'ADDRESS' ),$rec->getField( 'SALARY' ));
    $rec->moveNext();
}

//SQLite切断
$con->close();