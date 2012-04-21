<?php
/* This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://sam.zoy.org/wtfpl/COPYING for more details. */

ini_set('display_errors', 1);
error_reporting(E_ALL);

require(__DIR__ . '/lib/SplClassLoader.php');

$classLoader = new SplClassLoader('WebSocket', __DIR__ . '/lib');
$classLoader->register();

$server = new \WebSocket\Server('10.58.213.138', 8001, false);

// server settings:
$server->setMaxClients(2000);
$server->setCheckOrigin(true);
$server->setAllowedOrigin('five-in-line.tutoky.com');
$server->setAllowedOrigin('gomoku-live.eu');
$server->setAllowedOrigin('gomokulive.eu');
$server->setMaxConnectionsPerIp(2000);
$server->setMaxRequestsPerMinute(2000);

// Hint: Status application should not be removed as it displays usefull server informations:
$server->registerApplication('status', \WebSocket\Application\StatusApplication::getInstance());
$server->registerApplication('demo', \WebSocket\Application\DemoApplication::getInstance());
$server->registerApplication('gomoku', \WebSocket\Application\GomokuApplication::getInstance());

$server->run();