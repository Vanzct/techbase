<?php

require_once "config.php";
class DBConn{
	
 	private $_conn=null;

 	public function getConn($schema=DB_TEST,$username=DB_USERNAME,$password=DB_PASSWORD){
 		try{
 			$this->_conn=new PDO($schema,$username,$password);
 			$this->_conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 			$this->_conn->query("set names utf8");
 			return $this->_conn;
 		}catch(PDOException $e){
 			echo "DBConn getConn() fail:".$e->getMessage();
 			$_conn=null;
 		}	
 	}
 	function __desctruct(){
 		$this->_conn=null;
 	}
}
?>
