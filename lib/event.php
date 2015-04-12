<?php
require_once 'connect.php';

class Event extends connect{
	private $time;
	private $type;
	private $description;
	private $decision;

	public function __constructor(){

	}
	public function __set($name,$value){
		$this->$name = $value;
	}
	public function __get($name){
		return $this->$name;
	}
	public function save(){
		$sql = "INSERT INTO events (time,type,description,decision) VALUES ('{$this->time}','{$this->type}','{$this->description}','{$this->decision}')";
		$res = $this->query($sql);
		return $res?true:false;
	}
	public static function getJSONEvents(){
		$db = new connect();
		$res = $db->query("SELECT * FROM events");
		if($db->rows($res) > 0){
			$events = [];
			while($d = $db->assoc($res)){
				$events[] = $d;
			}
			return json_encode($events);
		}
		return false;
	} 
}