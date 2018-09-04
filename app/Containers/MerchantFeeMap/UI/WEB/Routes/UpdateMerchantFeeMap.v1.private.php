<?php

/** @var Route $router */
$router->patch('merchantfeemaps/{id}', [
    'as' => 'web_merchantfeemap_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
