<?php
/** 
  データベースの例外クラス
*/
class DataBaseException extends Exception
{
  public function __construct( $message, $con, $sql = "" ){
    $errno  = $con->lastErrorCode();
    $errmsg = $con->lastErrorMsg();
    parent::__construct( "{$message} [{$errno}:{$errmsg}] {$sql} \n", 0 );
  }
}
 
/**
  SQLite用ライブラリ
*/
class SqliteConnect{

  private     $con;
  private     $insert_id;
   
  public function __construct( $filename ){
    try {
      $this->con = $this->open( $filename );
      $this->execute( 'PRAGMA foreign_keys=ON;' );
    } catch ( Exception $e ) {
      $message = $e->getMessage();
      die( "データベースへの接続に失敗しました。[{$message}] \n" );
    }
  }
   
  /**
    データベース接続
    @param  $filename   SQLiteデータベースファイルPATH
    @return SQLite3オブジェクト
  */
  public function open( $filename ){
    $con = new SQLite3( $filename );
    chmod( $filename, 0666 );
    return $con;
  }
   
  /**
    データベース接続破棄
    @return void
  */
  public function close(){
    $this->con->close();
  }
   
  /** 
    コネクションを取得する 
    @return SQLite3オブジェクト
  */
  public function get_connect(){
    return $this->con;
  }
   
  /** 
    SELECT以外のクエリ実行 
    @param  $sql  SELECT以外のSQLクエリ
    @throw  DataBaseException
    @return void
  */
  public function execute( $sql ){
    $ret = $this->con->exec( $sql );
    if( !$ret ) {
      throw new DataBaseException( 
        "データベースの更新に失敗しました。",
        $this->con,
        trim( $sql )
      );
    }
  }
   
  /** 
    SELECT文実行 
    @param  $sql  SELECTクエリ
    @throw  DataBaseException
    @return array   : SELECT結果の連想配列
  */
  public function select( $sql ){
    $ret = $this->con->query( $sql );
    if( !$ret ) {
      throw new DataBaseException( 
        "データベースの読み出しに失敗しました。",
        $this->con,
        trim( $sql )
      );
    }
     
    $result = array();
    while( $rec = $ret->fetchArray( SQLITE3_ASSOC ) ) {
      $result[] = $rec;
    }
    return $result;
  }
   
  /** 
    エスケープする 
    @param  $str      エスケープする文字列データ
    @return string    エスケープした文字列データ
  */
  public function e( $str ){
    return SQLite3::escapeString( $str );
  }
   
  /** 
    スカラー関数登録 
    @param  $fname    関数名
    @param  $callback クロージャ/無名関数等
    @throw  DataBaseException
  */
  public function regist_scalar( $fname, $callback ){
    $ret = $this->con->createFunction( $fname, $callback );
    if( $ret === false ) {
      throw new DataBaseException( 
        "スカラー関数の設定に失敗しました。",
        $this->con
      );
    }
  }
   
  /** 
    集計関数登録 
    @param  $fname            関数名
    @param  $step_callback    各行の値に対して適用する無名関数等
    @param  $final_callback   集計値に対して適用する無名関数等
    @throw  DataBaseException
  */
  public function regist_aggregater( $fname, $step_callback, $final_callback ){
    $ret = $this->con->createAggregate( $fname, $step_callback, $final_callback );
    if( $ret === false ) {
      throw new DataBaseException( 
        "集計関数の設定に失敗しました。",
        $this->con
      );
    }
  }
}
 
/**
  結果セット操作クラス
*/
class ResultSet
{
  private $result;
  private $row_count;
  private $row_pointer;
  private $field_names;
   
  public function __construct( $resouce ){
    $this->result       = $resouce;
    $this->row_count    = count( $this->result );
    $this->row_pointer  = 0;
    $this->field_names  = @array_keys( $this->result[ 0 ] );
  }
   
  /**
    カラム番号のカラム名を返す
    @param  $column   カラム番号
    @return integer
  */
  public function getFieldName( $column ){
    return $this->field_names[ $column ];
  }
   
  /**
    カラム数を返す
    @return integer
  */
  public function getFieldCount(){
    return count( $this->field_names );
  }
   
  /**
    カラム名を指定してカレント行の値を返す
    @param  $fieldName   カラム名
    @return mixed
  */
  public function getField( $fieldName ){
    if( $this->isEof() ){
      return false;
    }else{
      return $this->result[ $this->row_pointer ][ $fieldName ];
    }
  }
   
  /**
    行数を返す
    @return integer
  */
  public function getRowCount(){
    return $this->row_count;
  }
   
  /**
    最終行を超えたか
    @return boolean
  */
  public function isEof(){
    if( $this->row_pointer >= $this->row_count ){
      return true;
    }else{
      return false;
    }
  }
   
  /**
    行ポインタをゼロクリアする
    @return void
  */
  public function reset(){
    $this->row_pointer = 0;
  }
   
  /**
    行ポインタを1進める
    @return boolean
  */
  public function moveNext(){
    if( $this->row_count >= $this->row_pointer ){
      $this->row_pointer += 1;
      return true;
    }else{
      return false;
    }
  }
}