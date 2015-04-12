<?php
if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['command'])){
    $command = $_GET['command'];
    $status = 'pending';
    $url = "http://robo13.scienceontheweb.net/index.php?t=command&q=command:".$command.",status:".$status;
    $res = file_get_contents($url);
    echo $res;
    exit;
}
