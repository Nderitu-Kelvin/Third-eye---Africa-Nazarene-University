<?php
require_once 'connect.php';

class AndroidLogData extends connect{
	private $longitude;
	private $latitude;
	private $temperature;
	private $devicetime;
	private $coordx;
	private $coordy;
	private $accelx;
	private $accely;
	private $accelz;
	private $heading;
	private $velocity;
	private $status;
	private $imagepath;
	private $videopath;

	public function __construct(){
		parent::__construct();
	}
	public function __set($name,$value){
		$this->$name = $value;
	}
	public function __get($name){
		return $this->name;
	}
	public function save(){
		$sql = "INSERT INTO main ";
		$sql .= "(longitude,latitude,temperature,logtime,imagepath,videopath,devicetime,coordx,coordy,accelx,accely,accelz,heading,velocity,status) VALUES ";
		$sql .= "('{$this->longitude}','{$this->latitude}','{$this->temperature}',CURRENT_TIMESTAMP,";
		$sql .= "'{$this->imagepath}','{$this->videopath}','{$this->devicetime}','{$this->coordx}','{$this->accelx}','{$this->accely}','{$this->accelz}','{$this->heading}','{$this->velocity}','{$this->status}')";
		$res = $this->query($sql);
		return $res;
	}
	public static function getRaw($id){
		$db = new connect();
		$res = $db->query("SELECT * FROM main WHERE id={$id}");
		if($db->rows($res) > 0){
			$data = $db->assoc($res);
			return $data;
		}
	}
	public static function getJSON($id){
		return json_encode(AndroidLogData::getRAW($id));
	}
	public static function getJSONLogs(){
		$db = new connect();
		$res = $db->query("SELECT * FROM main");
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