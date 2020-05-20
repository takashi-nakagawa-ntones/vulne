<?php
$parsonalData = array();
$pathToTestDB = './../back/RemoteFileInclusion/sqlitedb/testdb';
$con = new SqliteConnect($pathToTestDB);
$rec = new ResultSet( $con->select( 'SELECT * FROM COMPANY') );
for( $i = 0 ; $i < $rec->getRowCount() ; $i += 1 ) {
    $parsonalData[$rec->getField( 'ID' )] = array($rec->getField( 'PW' ),$rec->getField( 'NAME' ),$rec->getField( 'AGE' ),$rec->getField( 'ADDRESS' ),$rec->getField( 'SALARY' ));
    $rec->moveNext();
}
$con->close();
var_dump($parsonalData);