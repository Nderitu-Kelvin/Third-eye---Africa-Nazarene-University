$("#command").keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		var com = $('textarea#command').val().split('\n');
		var c = com[com.length-1];
		$.get('socket.php',{command:c},function(data,status){
            console.log(data);
        });	
	}
});