<?php
require_once 'connect.php';

class Command extends connect{
	private $id;
	private $command;
	private $status;

	public function __construct(){
		parent::__construct();
	}
	public function __set($name,$value){
		$this->$name = $value;
	}
	public function __get($name){
		return $this->$name;
	}
	public function store(){
		$sql = "INSERT INTO commands (command,status) VALUES ('{$this->command}','{$this->status}')";
		$res = $this->query($sql);
		return $res?"true":"false";
	}
	public function delete($id){
		return $this->query("DELETE FROM commands WHERE id={$id}")?"true":"false";
	}
	public static function getStatus($id){
		$sql = "SELECT FROM commands WHERE id={$id}";
		$res = $this->query($sql);
		if($this->rows($res) > 0){
			$a = $this->assoc($res);
			return $a['status'];
		}
		return "false";
	}
}