<?php
function parse($str){
	$list = explode(',',$str);
	$data = [];
	foreach($list as $item){
		$sub = explode('=',$item);
		$left = $sub[0];
		$right = $sub[1];
		$data[$left] = $right;
	}
	return $data;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['q'])){
    $query = $_POST['q'];    
    file_put_contents("test2.txt",$query);
    $list = explode(' ',$query);
    $type = $list[0];
    unset($list[0]);
    
    switch($type){
        case "LOG":
            $str = implode(",",$list);
            $str = str_replace("=",":",$str);
            $res = file_get_contents("http://robo13.scienceontheweb.net/index.php?t=logdata&q=".$str);
            echo $str;
            break;
        case "EVENT":
            $str = implode(",",$list);
            $str = str_replace("=",":",$str);
            $res = file_get_contents("http://robo13.scienceontheweb.net/index.php?t=event&q=".$str);
            echo $res;
            break;
    }
    exit;
}