PHP WebSocket
=============
A websocket server implemented in php.

- Supports flash websocket policy file!
- Supports websocket draft hybi-10 (Currently tested with Chrome 16 and Firefox 8).
- Supports origin-check.
- Supports various security/performance settings.
- Application module, the server can be extended by custom behaviors.

## Server example

This creates a server on localhost:8000 with one Application that listens on `ws://localhost:8000/demo`:

	$server = new \WebSocket\Server('localhost', 8000);

	// server settings:	
	$server->setCheckOrigin(true);
	$server->setAllowedOrigin('foo.lh');
	$server->setMaxClients(20);
	$server->setMaxConnectionsPerIp(15); 
	$server->setMaxRequestsPerMinute(50);

	$server->registerApplication('demo', \WebSocket\Application\DemoApplication::getInstance());
	$server->run();

## Libraries used
- [web-socket-js] (https://github.com/gimite/web-socket-js) by Hiroshi Ichikawa <http://gimite.net/en/>
- [SplClassLoader](http://gist.github.com/221634) by the PHP Standards Working Group
- [jQuery](http://jquery.com/)