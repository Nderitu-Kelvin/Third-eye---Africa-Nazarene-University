<?php
     $res = file_get_contents("http://robo13.scienceontheweb.net/index.php?t=getev");
     $events = json_decode($res,true);
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Starter Application</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="bootstrap/css/dashboard.css" />
    <script src="js/jquery.js"></script>
	<style>
		html{
			font-family: calibri;
		}
		.show{
			/*background-color: #777;*/
			border-right: solid #eee 2px;
			border-top: solid 4px #eee;
			height: 585px;
		}
		.r{
			height: 20px;
			background-color: white;
		}
	</style>
</head>
<body style="padding-top: 0px"> 
    <nav role="navigation" class="navbar navbar-default" style="margin-bottom: 0px">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">THIRD EYE</a>
    </div>
    <!-- Collection of nav links and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li  class="active"><a href="events.php">Events</a></li>
            <li><a href="logs.php">Logs</a></li>
        </ul>
    </div>
</nav>
	<div class="show col-lg-9">
        <div class="row">
            <h3>Events</h3>
        </div>
        <div class="row">
            <table class="table table-condensed">
                <thead><tr><th>Time</th><th>Type</th><th>Description</th><th>Decision</th></tr></thead>
                <tbody>
                    <?php foreach($events as $event){ ?>
                        <tr><td><?=$event['time']?></td><td><?=$event['type']?></td><td><?=$event['description']?></td><td><?=$event['decision']?></td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
	<div class="show col-lg-3">
		<div class="row" >
            <div class="col-lg-12">Console</div>
            <div class="col-lg-12">
                <textarea id="command" style="height: 100%; width: 100%;background-color: black; color: white" rows="27" cols="20"></textarea>
             </div>
        </div>
	</div> 
    <script src="js/commandHandler.js"></script>
</body>
</html>
