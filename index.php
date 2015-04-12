<?php
require_once 'lib/androidlogdata.php';
require_once 'lib/event.php';
require_once 'lib/command.php';

function parse($str){
	$list = explode(',',$str);
	$data = [];
	foreach($list as $item){
		$sub = explode(':',$item);
		$left = $sub[0];
		$right = $sub[1];
		$data[$left] = $right;
	}
	return $data;
}
if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['t'])){
	$type = $_GET['t'];
	switch($type){
		case "event":
			$d = parse($_GET['q']);
			$ev = new Event();
			$ev->time = $d['time'];
			$ev->type = $d['type'];
			$ev->description = $d['description'];
			$ev->decision = $d['decision'];

			echo $ev->save()?"true":"false";
			break;
		case "logdata":
			$d = parse($_GET['q']);
			$data = new AndroidLogData();
			$data->longitude = $d['longitude'];
			$data->latitude = $d['latitude'];
			$data->temperature = $d['temperature'];
			$data->imagepath = $d['imagepath'];
			$data->videopath = $d['videopath'];

			echo $data->save()?"true":"false";
			break;
		case "command":
			$d = parse($_GET['q']);
			$c = new Command();
			$c->command = $d['command'];
			$c->status = $d['status'];

			echo $c->store()?"true":"false";
			break;
		case "getev":
			$events = Event::getJSONEvents();
			echo $events;
			break;
		case "getlog":
			$logs = AndroidLogData::getJSONLogs();
			echo $events;
			break;
		default:
			echo "unknown command";
	}
}
