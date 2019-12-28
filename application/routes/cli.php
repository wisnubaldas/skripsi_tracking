<?php

/**
 * CLI Routes
 *
 * This routes only will be available under a CLI environment
 */

// To enable Luthier-CI built-in cli commands
// uncomment the followings lines:


// Route::cli('seed/{name}', function($name){
//     Route::cli($name, 'SeederController@'.$name);
// });
Route::group('seed', function(){
     Route::cli('{name}', 'SeederController@index');
});

// Route::cli('import','TrackingController@import',['namespace' => 'backend']);
// Route::cli('export','TrackingController@export',['namespace' => 'backend']);
Luthier\Cli::maker();
Luthier\Cli::migrations();