<?php
require_once 'constants.php';

class connect{
	private static $database;

	public function __construct(){
		self::$database = new mysqli(credentials::HOST,credentials::ROOT,credentials::PASS,credentials::DATABASE);
		//self::$database_select = mysqli_select_db(self::$database,DATABASE);
	}
	/*
	 @return self::$database
	  
	 */
	public function getDatabase(){
		return self::$database;
	}
	public function query($sql){
		return mysqli_query(self::$database,$sql);
	}
	public function close(){
		mysqli_close(self::$database);
		//echo "Database closed<br />";
	}
	public function insertId(){
		return mysqli_insert_id(self::$database);
	}
	public function assoc($result){
		return mysqli_fetch_assoc($result);
	}
	public function rows($result){
		return mysqli_num_rows($result);
	}
	public function prepare($string){
		if(!get_magic_quotes_gpc()){$string = addslashes($string);}
		else return false;
		return $string;
	}
	public function __destruct(){
		$this->close();
	}
}