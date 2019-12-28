<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Capsule\Manager as Capsule;

$active_group = env('DB_GROUP');
$query_builder = TRUE;
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => env('DB_HOST'),
	'username' => env('DB_USERNAME'),
	'password' => env('DB_PASSWORD'),
	'database' => env('DB_DATABASE'),
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
	// orm connect
	$capsule = new Capsule;
	$capsule->addConnection([
	    'driver'    => 'mysql',
	    'host'      => env('DB_HOST'),
	    'database'  => env('DB_DATABASE'),
	    'username'  => env('DB_USERNAME'),
	    'password'  => env('DB_PASSWORD'),
	    'charset'   => 'utf8',
	    'collation' => 'utf8_general_ci',
	    'prefix'    => '',
	],env('DB_GROUP'));

$capsule->setAsGlobal();
$capsule->bootEloquent();