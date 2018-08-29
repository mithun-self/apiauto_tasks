<?php

/** @var Route $router */
$router->patch('newfeesweb/{id}', [
    'as' => 'web_newfees_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
