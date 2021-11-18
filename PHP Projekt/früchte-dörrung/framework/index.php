<?php
require 'core/bootstrap.php';

$routes = [
	'/form' => 'FormController@index',
	'/edit' => 'EditController@index',
	'/insert' => 'InsertController@index',
	'' => 'WelcomeController@index',

	'/edit/editdata' => 'EditController@edit',
	'/insert/insertdata' => 'InsertController@insert',
];

$db = [
	'name'     => 'früchte-dörrung',
	'username' => 'root',
	'password' => '',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');
