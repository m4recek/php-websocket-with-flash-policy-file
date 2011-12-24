/* Location of WebSocketMain.swf file */
WEB_SOCKET_SWF_LOCATION = "js/WebSocketMain.swf";

/* Uncomment for debug information in Console log */
//WEB_SOCKET_DEBUG = true;

$(document).ready(function() {		
	log = function(msg){
		$('#log').append(msg + '<br/>')
	};			
	
	var socket;
	var server = 'ws://localhost:8000/demo';
	
	if ( $.browser.mozilla )
	{
		socket = new MozWebSocket(server);
	}
	else
	{
		socket = new WebSocket(server);
	}	

	socket.onopen = function(msg){
		$('#status').removeClass().addClass('online').html('online');				
	};
	socket.onmessage = function(msg){
		var response = JSON.parse(msg.data);
		log("Action: " + response.action);
		log("Data: " + response.data);
	};
	socket.onclose = function(msg){
		$('#status').removeClass().addClass('offline').html('offline');
	};

	$('#send').click(function(){
		var payload = new Object();				
		payload['action'] = $('#action').val();
		payload['data'] = $('#data').val();				
		socket.send(JSON.stringify(payload));
	});	
	
	$('#status').click(function(){
		socket.close();		
	});
});