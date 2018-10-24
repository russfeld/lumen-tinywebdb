<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$admin = env('ADMIN_KEY');

$router->get('/', 'DataController@home');
$router->get('/' . $admin, 'DataController@dump');
$router->get('/' . $admin . '/new', 'DataController@newKey');
$router->get('/' . $admin . '/delete', 'DataController@deleteKey');
$router->post('/{key}/storeavalue', 'DataController@store');
$router->get('/{key}/storeavalue', 'DataController@store');
$router->get('/{key}/getvalue', 'DataController@get');
$router->post('/{key}/getvalue', 'DataController@get');
$router->get('/{key}/', 'DataController@index');
