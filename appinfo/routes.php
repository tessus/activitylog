<?php
/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\ActivityLog\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */
return [
    'routes' => [
	   ['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],
	   ['name' => 'page#do_echo', 'url' => '/echo', 'verb' => 'POST'],
     ['name' => 'log#index', 'url' => '/log', 'verb' => 'GET'],
     ['name' => 'log#db', 'url' => '/log/db', 'verb' => 'GET'],
     ['name' => 'user#index', 'url' => '/usr', 'verb' => 'GET'],
     ['name' => 'log#download', 'url' => '/log/download', 'verb' => 'GET'],
    ]
];
