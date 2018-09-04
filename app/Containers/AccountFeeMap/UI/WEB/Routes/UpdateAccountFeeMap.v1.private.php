<?php

/** @var Route $router */
$router->patch('accountfeemaps/{id}', [
    'as' => 'web_accountfeemap_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
