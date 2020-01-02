<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook = Luthier\Hook::getHooks([
    'modules' => [ 'auth' , 'debug' ]
]);

$hook['pre_system'][] = function(){
    $whoops = new Whoops\Run;
    $whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());
    $whoops->register();
};

$dotenv = Dotenv\Dotenv::create(FCPATH);
$dotenv->load();

//$hook['post_controller_constructor'] = array(
//    'class' => 'EzRbacHook',
//    'function' => 'accessCheck',
//    'filename' => 'EzRbacHook.php',
//    'filepath' => 'third_party/ezRbac'
//);
//

